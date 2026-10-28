<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\JobApplication;
use MongoDB\BSON\Regex;
use App\Mail\JobApplicationConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CandidateJobController extends Controller
{
    public function index(Request $request)
    {
    $q = trim((string) $request->query('q', ''));
    $location = trim((string) $request->query('location', ''));

    // Only display active jobs.
    $query = Job::where('status', 'active');

    // Search job title, company name, and skills.
    if ($q !== '') {
        $searchRegex = new Regex(preg_quote($q, '/'), 'i');

        $query->where(function ($subQuery) use ($searchRegex) {
            $subQuery->where('job_title', 'regex', $searchRegex)
                ->orWhere('company_name', 'regex', $searchRegex)
                ->orWhere('skills', 'regex', $searchRegex);
        });
    }

    // Search job location and company city.
    if ($location !== '') {
        $locationRegex = new Regex(preg_quote($location, '/'), 'i');

        $query->where(function ($subQuery) use ($locationRegex) {
            $subQuery->where('location', 'regex', $locationRegex)
                ->orWhere('company_city', 'regex', $locationRegex);
        });
    }

    $jobs = $query->orderBy('created_at', 'desc')->get();

    return view('candidate.jobs.index', compact(
        'jobs',
        'q',
        'location'
    ));
    }

    public function show(string $id)
    {
        $job = Job::where('_id', $id)
            ->where('status', 'active')
            ->first();

        if (!$job) {
            return redirect()
                ->route('candidate.jobs.index')
                ->with('error', 'Job not found or is no longer available.');
        }

        // Fetch the complete company record from MongoDB.
        $company = Company::where(
            'recruiter_id',
            (string) $job->recruiter_id
        )->first();

        return view('candidate.jobs.show', compact('job', 'company'));
    }

    
public function applyForm(string $id)
{
    $job = Job::where('_id', $id)
        ->where('status', 'active')
        ->first();

    if (!$job) {
        return redirect()
            ->route('candidate.jobs.index')
            ->with('error', 'This job is not available.');
    }

    return view('candidate.jobs.apply', compact('job'));
}

public function storeApplication(Request $request, string $id)
{
    $job = Job::where('_id', $id)
        ->where('status', 'active')
        ->first();

    if (!$job) {
        return redirect()
            ->route('candidate.jobs.index')
            ->with('error', 'This job is not available.');
    }

    $validated = $request->validate([
        'full_name' => 'required|string|max:150',
        'contact_number' => [
            'required',
            'regex:/^[0-9+\-\s()]{7,20}$/',
        ],
        'email' => ['required', 'string', 'email:rfc,dns', 'max:254'],
        'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
    ]);

    // Prevent the same candidate from applying twice.
    $alreadyApplied = JobApplication::where(
        'job_id',
        (string) $job->_id
    )->where(
        'candidate_id',
        (string) auth()->id()
    )->exists();

    if ($alreadyApplied) {
        return redirect()
            ->route('candidate.jobs.show', ['id' => $id])
            ->with('error', 'You have already applied for this job.');
    }

    // Store the resume in storage/app/public/resumes.
    $resumePath = $request->file('resume')
        ->store('resumes', 'public');

   
    // Save the application first.
    $application = JobApplication::create([
        'job_id' => (string) $job->_id,
        'job_title' => $job->job_title,
        'company_name' => $job->company_name,
        'candidate_id' => (string) auth()->id(),
        'full_name' => $validated['full_name'],
        'contact_number' => $validated['contact_number'],
        'email' => $validated['email'],
        'resume_path' => $resumePath,
        'status' => 'pending',
    ]);

    // Send a confirmation email without losing the saved application
    // if the email service is temporarily unavailable.
    try {
        Mail::to($validated['email'])
            ->send(new JobApplicationConfirmation($application));
    } catch (\Throwable $e) {
        Log::error('JobBridge application confirmation email failed.', [
            'application_id' => (string) $application->_id,
            'message' => $e->getMessage(),
        ]);
    }

    return redirect()
        ->route('candidate.jobs.show', ['id' => $id])
        ->with(
            'success',
            'Your job application has been submitted successfully!'
        );

}
/**
 * Display applications belonging to the logged-in candidate.
 */
public function myApplications()
{
    abort_unless(
        auth()->user()->role === 'candidate',
        403
    );

    $applications = JobApplication::where(
        'candidate_id',
        (string) auth()->id()
    )
        ->orderBy('created_at', 'desc')
        ->get();

    return view(
        'candidate.applications.index',
        compact('applications')
    );
}

/**
 * Cancel and permanently delete the candidate's application.
 */
public function cancelApplication(string $id)
{
    abort_unless(
        auth()->user()->role === 'candidate',
        403
    );

    // Find only an application owned by the logged-in candidate.
    $application = JobApplication::where(
        'candidate_id',
        (string) auth()->id()
    )
        ->where('_id', $id)
        ->first();

    if (!$application) {
        return redirect()
            ->route('candidate.applications.index')
            ->with('error', 'Application not found or already deleted.');
    }

    // Delete the uploaded resume from the public storage disk.
    if (!empty($application->resume_path)) {
        Storage::disk('public')->delete(
            $application->resume_path
        );
    }

    // Permanently delete the application document.
    $application->delete();

    return redirect()
        ->route('candidate.applications.index')
        ->with(
            'success',
            'Your job application has been cancelled successfully.'
        );
}

}
