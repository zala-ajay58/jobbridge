<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Applications | JobBridge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --green: #21604A;
            --dark-green: #144432;
            --pale-green: #edf5f0;
            --border: #dce7e0;
            --ink: #26352c;
            --muted: #718078;
            --page: #f5f8f6;
        }
        * { box-sizing: border-box; }
        body { margin: 0; background: var(--page); color: var(--ink); font-family: Inter, system-ui, -apple-system, "Segoe UI", Arial, sans-serif; }
        .navbar { background: #fff; border-bottom: 1px solid var(--border); }
        .brand { color: var(--green); font-size: 1.5rem; font-weight: 850; text-decoration: none; letter-spacing: -.5px; }
        .brand span { color: var(--dark-green); }
        .page-wrap { max-width: 1050px; }
        .page-title { color: var(--dark-green); font-weight: 850; letter-spacing: -.5px; }
        .muted { color: var(--muted); }
        .application-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; box-shadow: 0 6px 22px rgba(20,68,50,.045); padding: 22px; }
        .application-card + .application-card { margin-top: 15px; }
        .job-icon { display: flex; align-items: center; justify-content: center; width: 54px; height: 54px; flex: 0 0 54px; color: var(--green); background: var(--pale-green); border: 1px solid var(--border); border-radius: 14px; font-size: 1.45rem; }
        .job-title { color: var(--dark-green); font-weight: 800; overflow-wrap: anywhere; }
        .meta { color: var(--muted); font-size: .9rem; }
        .status { display: inline-flex; align-items: center; padding: 6px 11px; border-radius: 99px; background: var(--pale-green); color: var(--green); font-size: .78rem; font-weight: 750; text-transform: capitalize; border: 1px solid var(--border); }
        .status.rejected { background: #fff0f0; color: #a52d37; border-color: #f1d0d3; }
        .status.hired, .status.shortlisted { background: #e8f5eb; color: #21633b; border-color: #cce5d2; }
        .status.reviewed { background: #fff7e8; color: #875b13; border-color: #f1e2bc; }
        .btn-green { color: #fff; background: var(--green); border: 1px solid var(--green); border-radius: 9px; font-weight: 650; }
        .btn-green:hover { color: #fff; background: var(--dark-green); border-color: var(--dark-green); }
        .btn-cancel { color: #b02a37; background: #fff; border: 1px solid #edc9cd; border-radius: 9px; font-weight: 650; }
        .btn-cancel:hover { color: #fff; background: #b02a37; border-color: #b02a37; }
        .empty-state { background: #fff; border: 1px dashed #cbdcd1; border-radius: 18px; padding: 50px 22px; text-align: center; }
        .empty-icon { width: 70px; height: 70px; display: inline-flex; align-items: center; justify-content: center; border-radius: 20px; background: var(--pale-green); color: var(--green); font-size: 2rem; }
        footer { color: var(--muted); background: #fff; border-top: 1px solid var(--border); font-size: .85rem; }
        @media (max-width: 575.98px) {
            .application-card { padding: 17px; }
            .job-icon { width: 46px; height: 46px; flex-basis: 46px; }
            .action-buttons .btn { width: 100%; }
        }
    </style>
</head>
<body>
<nav class="navbar sticky-top">
    <div class="container page-wrap py-2 d-flex align-items-center justify-content-between gap-3">
        <a class="brand" href="{{ route('home') }}">Job<span>Bridge</span></a>
        <a href="{{ route('candidate.jobs.index') }}" class="btn btn-outline-success">
            <i class="bi bi-search me-1"></i><span class="d-none d-sm-inline">Browse Jobs</span><span class="d-sm-none">Jobs</span>
        </a>
         <a href="{{ route('home') }}" class="btn btn-green">
        <i class="bi bi-house-door me-2"></i>
        Home
    </a>
    </div>
</nav>

<main class="container page-wrap py-4 py-lg-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
        <div>
            <div class="small fw-bold text-success mb-2"><i class="bi bi-person-workspace me-1"></i>CANDIDATE DASHBOARD</div>
            <h1 class="page-title h2 mb-2">My Applications</h1>
            <p class="muted mb-0">Track your submitted applications and withdraw an application if you no longer wish to continue.</p>
        </div>
        <span class="badge rounded-pill text-bg-light border px-3 py-2">{{ $applications->count() }} application(s)</span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @forelse($applications as $application)
        @php
            $status = strtolower((string) ($application->status ?? 'pending'));
            $jobId = (string) ($application->job_id ?? '');
        @endphp
        <article class="application-card">
            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                <div class="job-icon"><i class="bi bi-briefcase"></i></div>
                <div class="flex-grow-1 min-w-0">
                    <h2 class="job-title h5 mb-1">{{ $application->job_title ?? 'Job title unavailable' }}</h2>
                    <div class="fw-semibold mb-2">{{ $application->company_name ?? 'Company not specified' }}</div>
                    <div class="d-flex flex-wrap gap-3 meta">
                        <span><i class="bi bi-calendar3 me-1"></i>Applied
                            {{ !empty($application->created_at) ? $application->created_at->format('d M Y') : 'date unavailable' }}
                        </span>
                        <span><i class="bi bi-envelope me-1"></i>{{ $application->email ?? 'Email not available' }}</span>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-md-end gap-3">
                    <span class="status {{ in_array($status, ['rejected', 'hired', 'shortlisted', 'reviewed'], true) ? $status : '' }}">
                        <i class="bi bi-circle-fill me-2" style="font-size: 7px;"></i>{{ ucfirst($status) }}
                    </span>
                    <div class="d-flex flex-wrap gap-2 action-buttons">
                        @if($jobId !== '')
                            <a href="{{ route('candidate.jobs.show', ['id' => $jobId]) }}" class="btn btn-green btn-sm px-3 py-2">
                                <i class="bi bi-eye me-1"></i>View Job
                            </a>
                        @endif
                        <form action="{{ route('candidate.applications.destroy', ['id' => (string) $application->_id]) }}"
                              method="POST" class="cancel-application-form m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-cancel btn-sm px-3 py-2">
                                <i class="bi bi-x-circle me-1"></i>Cancel Application
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <section class="empty-state">
            <div class="empty-icon mb-3"><i class="bi bi-briefcase"></i></div>
            <h2 class="h4 fw-bold mb-2">No applications yet</h2>
            <p class="muted mb-4">When you apply for a job, it will appear here so you can track it.</p>
            <a href="{{ route('candidate.jobs.index') }}" class="btn btn-green px-4 py-2">
                <i class="bi bi-search me-2"></i>Find Jobs
            </a>
        </section>
    @endforelse
</main>

<footer class="mt-5 py-3">
    <div class="container page-wrap text-center">© {{ date('Y') }} JobBridge. Connecting talent with opportunity.</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.cancel-application-form').forEach((form) => {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        Swal.fire({
            title: 'Cancel this application?',
            text: 'This will permanently delete your application from JobBridge.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, cancel it',
            cancelButtonText: 'Keep application',
            confirmButtonColor: '#b02a37',
            cancelButtonColor: '#21604A',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
</body>
</html>
