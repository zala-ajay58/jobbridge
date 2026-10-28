<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Display the job posting form
    public function create()
    {
        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        // Recruiters must register a company first
        if (!$company) {
            return redirect()
                ->route('recruiter.company.create')
                ->with('error', 'Please register your company before posting a job.');
        }

        return view('recruiter.jobs.create', compact('company'));
    }

    // Save the job
    public function store(Request $request)
    {
         // Find the logged-in recruiter's company
    $company = Company::where(
        'recruiter_id',
        (string) auth()->id()
    )->first();

    if (!$company) {
        return redirect()
            ->route('recruiter.company.create')
            ->with('error', 'Please register your company first.');
    }

    // Validate all job posting fields
    $validated = $request->validate([
        'job_title' => 'required|string|max:255',
        'job_type' => 'required|string|max:100',
        'work_mode' => 'required|string|max:100',
        'location' => 'required|string|max:255',
        'qualification' => 'required|string|max:255',

        'experience_min' => 'required|integer|min:0|max:50',
        'experience_max' => 'required|integer|min:0|max:50|gte:experience_min',

        'salary_min_lpa' => 'required|numeric|min:0',
        'salary_max_lpa' => 'required|numeric|min:0|gte:salary_min_lpa',

        'total_vacancies' => 'required|integer|min:1',
        'description' => 'required|string',
        'skills' => 'required|string|max:2000',
    ]);

    // Convert comma-separated skills into an array
    $validated['skills'] = array_values(array_filter(
        array_map(
            'trim',
            explode(',', $validated['skills'])
        )
    ));

    // Save the job and company details to MongoDB
    Job::create(array_merge($validated, [
        'recruiter_id' => (string) auth()->id(),
        'company_id' => (string) $company->_id,
        'company_name' => $company->company_name,
        'company_logo' => $company->company_logo ?? null,
        'company_industry' => $company->company_industry ?? null,
        'company_city' => $company->company_city ?? null,
        'company_website' => $company->company_website ?? null,
        'status' => 'active',
    ]));


        return redirect()
            ->route('recruiter.dashboard')
            ->with('success', 'Job posted successfully!');
    }

    public function reopen(string $id)
{
    $job = \App\Models\Job::where('_id', $id)
        ->where('recruiter_id', (string) auth()->id())
        ->firstOrFail();

    if (strtolower((string) $job->status) !== 'closed') {
        return redirect()
            ->back()
            ->with('error', 'This job is already active.');
    }

    $job->status = 'active';
    $job->save();

    return redirect()
        ->back()
        ->with('success', 'Job reopened successfully!');
}
}