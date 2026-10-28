<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RecruiterApplicationController extends Controller
{
    /**
     * Show applications for jobs owned by the logged-in recruiter.
     */
    public function index()
    {
        $recruiterId = (string) auth()->id();

        $jobs = Job::where('recruiter_id', $recruiterId)->get();

        $jobIds = $jobs->map(
            fn ($job) => (string) $job->_id
        )->all();

        $applications = empty($jobIds)
            ? collect()
            : JobApplication::whereIn('job_id', $jobIds)
                ->orderBy('created_at', 'desc')
                ->get();

        $total = $applications->count();
        $pending = $applications->where('status', 'pending')->count();
        $shortlisted = $applications->where('status', 'shortlisted')->count();
        $hired = $applications->where('status', 'hired')->count();

        return view('recruiter.applications.index', compact(
            'applications',
            'total',
            'pending',
            'shortlisted',
            'hired'
        ));
    }

    /**
     * Update an application's review status.
     */
    public function updateStatus(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'pending',
                    'reviewed',
                    'shortlisted',
                    'rejected',
                    'hired',
                ]),
            ],
        ]);

        $application = JobApplication::where('_id', $id)->first();

        if (!$application) {
            return redirect()
                ->route('recruiter.applications.index')
                ->with('error', 'Application not found.');
        }

        // Verify that this application belongs to one of this
        // recruiter's jobs before allowing a status update.
        $ownsJob = Job::where(
            '_id',
            (string) $application->job_id
        )->where(
            'recruiter_id',
            (string) auth()->id()
        )->exists();

        if (!$ownsJob) {
            abort(403, 'You are not authorized to update this application.');
        }

        $application->status = $validated['status'];
        $application->save();

        return redirect()
            ->route('recruiter.applications.index')
            ->with('success', 'Application status updated successfully.');
    }

    /**
     * Download a resume only if the job belongs to this recruiter.
     */
    public function downloadResume($id)
{
    $application = JobApplication::findOrFail($id);

    // Find the job associated with this application.
    $job = Job::find($application->job_id);

    // Ensure the logged-in recruiter owns this job.
    abort_unless(
        $job && (string) $job->recruiter_id === (string) auth()->id(),
        403
    );

    $resumePath = $application->resume_path;

    if (
        !$resumePath ||
        !Storage::disk('public')->exists($resumePath)
    ) {
        return redirect()
            ->route('recruiter.applications.index')
            ->with('error', 'CV file not found.');
    }

    $candidateName = Str::slug(
        $application->full_name ?? 'Candidate',
        '_'
    );

    $jobTitle = Str::slug(
        $application->job_title ?? 'Job',
        '_'
    );

    $extension = strtolower(
        pathinfo($resumePath, PATHINFO_EXTENSION)
    ) ?: 'pdf';

    $downloadName = "{$candidateName}_{$jobTitle}_CV.{$extension}";

    return Storage::disk('public')->download(
        $resumePath,
        $downloadName
    );
}
}
