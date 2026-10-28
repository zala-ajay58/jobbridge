<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class RecruiterJobController extends Controller
{
    public function index()
    {
        $jobs = Job::where(
            'recruiter_id',
            (string) auth()->id()
        )->orderBy('created_at', 'desc')->get();

        return view('recruiter.jobs.index', compact('jobs'));
    }

    private function findOwnedJob(string $id)
    {
        return Job::where('_id', $id)
            ->where('recruiter_id', (string) auth()->id())
            ->first();
    }

    public function edit(string $id)
    {
        $job = $this->findOwnedJob($id);

        if (!$job) {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'Job not found or access denied.');
        }

        if (strtolower((string) $job->status) === 'closed') {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'Closed jobs cannot be edited.');
        }

        return view('recruiter.jobs.edit', compact('job'));
    }

    public function update(Request $request, string $id)
    {
        $job = $this->findOwnedJob($id);

        if (!$job) {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'Job not found or access denied.');
        }

        if (strtolower((string) $job->status) === 'closed') {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'Closed jobs cannot be edited.');
        }

        $validated = $request->validate([
            'job_title' => 'required|string|max:150',
            'job_type' => 'required|string|max:50',
            'work_mode' => 'required|string|max:50',
            'location' => 'required|string|max:150',
            'qualification' => 'required|string|max:255',
            'experience_min' => 'required|integer|min:0|max:50',
            'experience_max' => 'required|integer|min:0|max:50|gte:experience_min',
            'salary_min_lpa' => 'required|numeric|min:0',
            'salary_max_lpa' => 'required|numeric|min:0|gte:salary_min_lpa',
            'total_vacancies' => 'required|integer|min:1',
            'skills' => 'required|string|max:2000',
            'description' => 'required|string|max:10000',
        ]);

        $validated['skills'] = array_values(array_filter(
            array_map('trim', explode(',', $validated['skills']))
        ));

        $job->update($validated);

        return redirect()
            ->route('recruiter.jobs.index')
            ->with('success', 'Job post updated successfully.');
    }

    public function close(string $id)
    {
        $job = $this->findOwnedJob($id);

        if (!$job) {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'Job not found or access denied.');
        }

        if (strtolower((string) $job->status) === 'closed') {
            return redirect()
                ->route('recruiter.jobs.index')
                ->with('error', 'This job is already closed.');
        }

        $job->update(['status' => 'closed']);

        return redirect()
            ->route('recruiter.jobs.index')
            ->with('success', 'Job closed successfully.');
    }
}
