
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Job Posts | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --green: #21604A;
            --green-dark: #144432;
            --green-light: #edf5f0;
            --page: #f5f8f6;
            --text: #26372f;
            --muted: #718078;
        }

        body {
            background: var(--page);
            color: var(--text);
            font-family: Inter, "Segoe UI", sans-serif;
        }

        .navbar {
            background: linear-gradient(110deg, var(--green-dark), var(--green));
        }

        .brand {
            color: #fff;
            font-size: 1.35rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -.4px;
        }

        .hero {
            background: linear-gradient(115deg, var(--green-dark), #2d795c);
            color: white;
            padding: 34px 0 64px;
        }

        .page-content {
            margin-top: -35px;
            padding-bottom: 40px;
        }

        .panel, .job-card {
            border: 1px solid #e5ece7;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 5px 22px rgba(26, 64, 44, .045);
        }

        .stat-card {
            border: 1px solid #e5ece7;
            border-radius: 16px;
            background: #fff;
            padding: 18px;
            height: 100%;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: var(--green-light);
            color: var(--green);
            font-size: 1.25rem;
        }

        .muted { color: var(--muted); }

        .job-card {
            transition: transform .18s ease, box-shadow .18s ease;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(26, 64, 44, .09);
        }

        .job-card.closed {
            background: #fcfdfc;
            border-color: #e2e5e3;
        }

        .job-title {
            font-size: 1.12rem;
            font-weight: 750;
            color: var(--green-dark);
        }

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 30px;
            padding: 7px 12px;
            font-size: .78rem;
            font-weight: 750;
            white-space: nowrap;
        }

        .status-active {
            background: #e5f6eb;
            color: #167443;
        }

        .status-closed {
            background: #edf0ee;
            color: #59645e;
        }

        .skill {
            display: inline-block;
            background: var(--green-light);
            color: var(--green);
            border-radius: 20px;
            padding: 5px 10px;
            margin: 3px 3px 3px 0;
            font-size: .79rem;
            font-weight: 600;
        }

        .meta-item {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #58685f;
            font-size: .88rem;
        }

        .btn-brand {
            background: var(--green);
            color: white;
            border-color: var(--green);
        }

        .btn-brand:hover {
            background: var(--green-dark);
            border-color: var(--green-dark);
            color: white;
        }

        .filter-input:focus {
            border-color: #80b69a;
            box-shadow: 0 0 0 .2rem rgba(33, 96, 74, .12);
        }

        .empty-icon {
            width: 76px;
            height: 76px;
            display: grid;
            place-items: center;
            margin: 0 auto;
            background: var(--green-light);
            color: var(--green);
            border-radius: 24px;
            font-size: 2rem;
        }

        @media (max-width: 576px) {
            .hero { padding: 27px 0 55px; }
            .job-card .card-body { padding: 18px !important; }
            .action-form, .action-form button { width: 100%; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark px-3 px-md-5 py-3">
    <div class="container-fluid px-0">
        <a class="brand" href="{{ route('recruiter.dashboard') }}">
            <i class="bi bi-briefcase-fill me-2"></i>JobBridge
        </a>

        <a href="{{ route('recruiter.dashboard') }}"
           class="btn btn-outline-light btn-sm rounded-pill px-3">
            <i class="bi bi-arrow-left me-1"></i> Dashboard
        </a>
    </div>
</nav>

<header class="hero">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <div class="small text-white-50 mb-2">
                    RECRUITER WORKSPACE
                </div>
                <h1 class="h2 fw-bold mb-2">My Job Posts</h1>
                <p class="mb-0 text-white-50">
                    Manage, close, and reactivate your job listings.
                </p>
            </div>

            <a href="{{ route('recruiter.jobs.create') }}"
               class="btn btn-light rounded-pill px-4 fw-semibold"
               style="color:var(--green-dark)">
                <i class="bi bi-plus-lg me-1"></i> Post a Job
            </a>
        </div>
    </div>
</header>

<main class="container page-content">

    @php
        $allJobs = $jobs;
        $activeCount = $allJobs->filter(function ($job) {
            return strtolower((string) ($job->status ?? 'active')) !== 'closed';
        })->count();

        $closedCount = $allJobs->count() - $activeCount;
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-4">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-briefcase"></i></div>
                <div>
                    <div class="muted small">Total Jobs</div>
                    <div class="fs-4 fw-bold">{{ $allJobs->count() }}</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-4">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-check-circle"></i></div>
                <div>
                    <div class="muted small">Active Jobs</div>
                    <div class="fs-4 fw-bold">{{ $activeCount }}</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="stat-card d-flex align-items-center gap-3">
                <div class="stat-icon"><i class="bi bi-archive"></i></div>
                <div>
                    <div class="muted small">Closed Jobs</div>
                    <div class="fs-4 fw-bold">{{ $closedCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <section class="panel p-3 p-md-4 mb-4">
        <label for="jobFilter" class="form-label fw-bold">
            <i class="bi bi-search me-2"></i>Search your job listings
        </label>

        <div class="input-group">
            <span class="input-group-text bg-white">
                <i class="bi bi-search muted"></i>
            </span>

            <input type="search"
                   id="jobFilter"
                   class="form-control filter-input"
                   placeholder="Search title, company, location, skills..."
                   autocomplete="off">

        </div>
        <div class="d-flex flex-wrap gap-2 mt-3" id="statusFilters">
    <button type="button"
            class="btn btn-sm btn-brand status-filter active"
            data-status="all">
        <i class="bi bi-grid me-1"></i> All Jobs
    </button>

    <button type="button"
            class="btn btn-sm btn-outline-success status-filter"
            data-status="active">
        <i class="bi bi-check-circle me-1"></i> Active Jobs
    </button>

    <button type="button"
            class="btn btn-sm btn-outline-secondary status-filter"
            data-status="closed">
        <i class="bi bi-lock me-1"></i> Closed Jobs
    </button>
</div>

        <div class="small muted mt-2" id="filterCount">
            Showing {{ $allJobs->count() }} jobs
        </div>
    </section>

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <div>
            <h2 class="h5 fw-bold mb-1">Your listings</h2>
            <div class="muted small">Manage the status of each job below.</div>
        </div>
    </div>

    @forelse($jobs as $job)
        @php
            $isClosed = strtolower((string) ($job->status ?? 'active')) === 'closed';

            $skills = $job->skills ?? [];
            if (is_string($skills)) {
                $skills = array_filter(array_map('trim', explode(',', $skills)));
            }
            if (!is_array($skills)) {
                $skills = [];
            }

            $minExp = $job->experience_min ?? null;
            $maxExp = $job->experience_max ?? null;

            $salaryMin = $job->salary_min_lpa ?? null;
            $salaryMax = $job->salary_max_lpa ?? null;
        @endphp

        <article
    class="card job-card {{ $isClosed ? 'closed' : '' }} mb-3 job-filter-item"
    data-status="{{ $isClosed ? 'closed' : 'active' }}"
    data-search="{{ strtolower(
        ($job->job_title ?? '') . ' ' .
        ($job->company_name ?? '') . ' ' .
        ($job->location ?? '') . ' ' .
        ($job->job_type ?? '') . ' ' .
        ($job->work_mode ?? '') . ' ' .
        implode(' ', $skills)
    ) }}"
>

            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
                    <div class="flex-grow-1">
                        <h3 class="job-title mb-2">{{ $job->job_title ?? 'Untitled Job' }}</h3>

                        <div class="d-flex flex-wrap gap-3 muted small">
                            <span><i class="bi bi-building me-1"></i>{{ $job->company_name ?: 'Your company' }}</span>
                            <span><i class="bi bi-geo-alt me-1"></i>{{ $job->location ?: 'Location not specified' }}</span>
                        </div>
                    </div>

                    @if($isClosed)
                        <span class="status status-closed">
                            <i class="bi bi-lock-fill"></i> Closed
                        </span>
                    @else
                        <span class="status status-active">
                            <i class="bi bi-check-circle-fill"></i> Active
                        </span>
                    @endif
                </div>

                <div class="d-flex flex-wrap gap-3 mt-4 mb-3">
                    <span class="meta-item">
                        <i class="bi bi-clock"></i>{{ $job->job_type ?: 'Job type not specified' }}
                    </span>

                    <span class="meta-item">
                        <i class="bi bi-laptop"></i>{{ $job->work_mode ?: 'Work mode not specified' }}
                    </span>

                    <span class="meta-item">
                        <i class="bi bi-briefcase"></i>
                        @if($minExp !== null && $maxExp !== null)
                            {{ $minExp }}–{{ $maxExp }} years
                        @elseif($minExp !== null)
                            {{ $minExp }}+ years
                        @else
                            Experience not specified
                        @endif
                    </span>

                    <span class="meta-item">
                        <i class="bi bi-people"></i>{{ $job->total_vacancies ?? 0 }} vacancies
                    </span>

                    <span class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        @if($salaryMin !== null && $salaryMax !== null)
                            {{ $salaryMin }}–{{ $salaryMax }} LPA
                        @elseif($salaryMin !== null)
                            {{ $salaryMin }} LPA
                        @else
                            Salary not specified
                        @endif
                    </span>
                </div>

                @if(count($skills))
                    <div class="mb-3">
                        @foreach($skills as $skill)
                            <span class="skill">{{ $skill }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="border-top pt-3 mt-3 d-flex flex-wrap align-items-center gap-2">
                    @if(!$isClosed)
                        <a href="{{ route('recruiter.jobs.edit', ['id' => (string) $job->_id]) }}"
                           class="btn btn-outline-success btn-sm rounded-pill px-3">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>

                        <form method="POST"
                              action="{{ route('recruiter.jobs.close', ['id' => (string) $job->_id]) }}"
                              class="action-form js-job-action"
                              data-action="close"
                              data-title="{{ $job->job_title ?? 'this job' }}">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                <i class="bi bi-x-circle me-1"></i> Close Job
                            </button>
                        </form>
                    @else
                        <span class="small muted me-1">
                            <i class="bi bi-info-circle me-1"></i>
                            This job is closed.
                        </span>

                        <form method="POST"
                              action="{{ route('recruiter.jobs.reopen', ['id' => (string) $job->_id]) }}"
                              class="action-form js-job-action"
                              data-action="reopen"
                              data-title="{{ $job->job_title ?? 'this job' }}">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="btn btn-brand btn-sm rounded-pill px-3">
                                <i class="bi bi-arrow-repeat me-1"></i> Reopen Job
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </article>
    @empty
        <div class="panel text-center py-5 px-3">
            <div class="empty-icon"><i class="bi bi-briefcase"></i></div>
            <h3 class="h5 fw-bold mt-3">No jobs posted yet</h3>
            <p class="muted mb-4">Your job listings will appear here after you publish your first job.</p>
            <a href="{{ route('recruiter.jobs.create') }}" class="btn btn-brand rounded-pill px-4">
                <i class="bi bi-plus-lg me-1"></i> Post Your First Job
            </a>
        </div>
    @endforelse

    <div id="noFilterResults" class="panel text-center py-4 px-3 d-none">
        <i class="bi bi-search fs-2 muted"></i>
        <p class="fw-semibold mt-2 mb-1">No matching jobs found</p>
        <p class="small muted mb-0">Try another title, location, or skill.</p>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    // Check whether SweetAlert2 loaded
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 failed to load. Check your internet connection or CDN.');
        return;
    }

    // HTML escaping for safe messages
    function escapeHtml(value) {
        const div = document.createElement('div');
        div.textContent = String(value);
        return div.innerHTML;
    }

    // SUCCESS ALERT
    @if(session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: @json(session('success')),
            confirmButtonText: 'OK',
            confirmButtonColor: '#21604A'
        });
    @endif

    // ERROR ALERT
    @if(session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: @json(session('error')),
            confirmButtonText: 'OK',
            confirmButtonColor: '#21604A'
        });
    @endif

    // VALIDATION ERROR ALERT
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Please check your form',
            html: @json($errors->all())
                .map(function (message) {
                    return '<p style="text-align:left;margin:6px 0;">' +
                        escapeHtml(message) + '</p>';
                }).join(''),
            confirmButtonColor: '#21604A'
        });
    @endif

    // CLOSE / REOPEN CONFIRMATION
    document.querySelectorAll('.js-job-action').forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            if (form.dataset.confirmed === 'true') {
                return;
            }

            const action = form.dataset.action;
            const isReopen = action === 'reopen';
            const jobTitle = form.dataset.title || 'this job';

            const result = await Swal.fire({
                icon: isReopen ? 'question' : 'warning',
                title: isReopen ? 'Reopen this job?' : 'Close this job?',
                html: isReopen
                    ? 'The job <strong>' + escapeHtml(jobTitle) +
                      '</strong> will become active again.'
                    : 'The job <strong>' + escapeHtml(jobTitle) +
                      '</strong> will be marked as closed.',
                showCancelButton: true,
                confirmButtonText: isReopen ? 'Yes, reopen it' : 'Yes, close it',
                cancelButtonText: 'Cancel',
                confirmButtonColor: isReopen ? '#21604A' : '#dc3545',
                cancelButtonColor: '#6c757d',
                reverseButtons: true
            });

            if (result.isConfirmed) {
                form.dataset.confirmed = 'true';

                const button = form.querySelector('button[type="submit"]');

                if (button) {
                    button.disabled = true;
                    button.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';
                }

                // Native submit sends the form without triggering this handler again
                HTMLFormElement.prototype.submit.call(form);
            }
        });
    });

    // JOB SEARCH + STATUS FILTERS
    const filterInput = document.getElementById('jobFilter');
    const clearButton = document.getElementById('clearJobFilter');
    const filterCount = document.getElementById('filterCount');
    const noResults = document.getElementById('noFilterResults');
    const cards = Array.from(document.querySelectorAll('.job-filter-item'));
    const statusButtons = document.querySelectorAll('.status-filter');

    let selectedStatus = 'all';

    function filterJobs() {
        if (!filterInput) return;

        const query = filterInput.value.trim().toLowerCase();
        let visible = 0;

        cards.forEach(function (card) {
            const matchesSearch =
                (card.dataset.search || '').includes(query);

            const matchesStatus =
                selectedStatus === 'all' ||
                (card.dataset.status || 'active') === selectedStatus;

            const matches = matchesSearch && matchesStatus;

            card.classList.toggle('d-none', !matches);

            if (matches) visible++;
        });

        if (filterCount) {
            filterCount.textContent =
                'Showing ' + visible + ' of ' + cards.length + ' jobs';
        }

        if (noResults) {
            noResults.classList.toggle(
                'd-none',
                visible > 0 || cards.length === 0
            );
        }
    }

    statusButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            selectedStatus = button.dataset.status || 'all';

            statusButtons.forEach(function (item) {
                item.classList.remove('active', 'btn-brand');
                item.classList.add('btn-outline-secondary');

                if (item.dataset.status === 'active') {
                    item.classList.remove('btn-outline-secondary');
                    item.classList.add('btn-outline-success');
                }
            });

            button.classList.remove(
                'btn-outline-secondary',
                'btn-outline-success'
            );
            button.classList.add('btn-brand', 'active');

            filterJobs();
        });
    });

    if (filterInput) {
        filterInput.addEventListener('input', filterJobs);
    }

    if (clearButton && filterInput) {
        clearButton.addEventListener('click', function () {
            filterInput.value = '';
            filterJobs();
            filterInput.focus();
        });
    }

    filterJobs();

});
</script>
</body>
</html>