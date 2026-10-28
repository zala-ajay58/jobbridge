<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $job->job_title ?? 'Job Details' }} | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --green-dark: #144432;
            --green-soft: #edf5f0;
            --green-border: #dce8e0;
            --ink: #25352d;
            --muted: #6b7b72;
            --page: #f5f8f6;
            --white: #fff;
            --shadow: 0 8px 28px rgba(20, 68, 50, .055);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page);
            color: var(--ink);
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Arial, sans-serif;
        }

        a { color: var(--green); }
        .navbar {
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid var(--green-border);
            backdrop-filter: blur(10px);
        }
        .brand {
            color: var(--green);
            font-size: 1.55rem;
            font-weight: 850;
            letter-spacing: -.7px;
            text-decoration: none;
        }
        .brand span { color: var(--green-dark); }
        .btn-green {
            color: #fff;
            background: var(--green);
            border: 1px solid var(--green);
            font-weight: 650;
            border-radius: 10px;
            transition: .2s ease;
        }
        .btn-green:hover, .btn-green:focus {
            color: #fff;
            background: var(--green-dark);
            border-color: var(--green-dark);
            transform: translateY(-1px);
        }
        .btn-outline-green {
            color: var(--green);
            background: #fff;
            border: 1px solid var(--green-border);
            border-radius: 10px;
            font-weight: 650;
        }
        .btn-outline-green:hover {
            color: var(--green-dark);
            background: var(--green-soft);
            border-color: #bfd6c8;
        }
        .page-wrap { max-width: 1180px; }
        .breadcrumb { font-size: .9rem; }
        .breadcrumb a { text-decoration: none; font-weight: 600; }
        .breadcrumb a:hover { text-decoration: underline; }

        .surface {
            background: var(--white);
            border: 1px solid var(--green-border);
            border-radius: 18px;
            box-shadow: var(--shadow);
        }
        .job-hero { padding: clamp(20px, 3vw, 32px); }
        .company-logo {
            width: 84px;
            height: 84px;
            flex: 0 0 84px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            object-fit: contain;
            padding: 7px;
            background: #fff;
            border: 1px solid var(--green-border);
            border-radius: 15px;
        }
        .logo-placeholder {
            color: var(--green);
            background: var(--green-soft);
        }
        .job-title {
            color: var(--green-dark);
            font-size: clamp(1.45rem, 3vw, 2rem);
            font-weight: 800;
            letter-spacing: -.65px;
            line-height: 1.2;
        }
        .company-name { font-size: 1.03rem; font-weight: 700; }
        .hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 18px;
            color: var(--muted);
            font-size: .9rem;
        }
        .hero-meta i { color: var(--green); }
        .status-pill, .skill-pill, .meta-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }
        .status-pill {
            padding: 7px 12px;
            color: var(--green);
            background: var(--green-soft);
            border: 1px solid var(--green-border);
            text-transform: capitalize;
        }
        .meta-pill {
            padding: 7px 11px;
            color: var(--green-dark);
            background: #f7faf8;
            border: 1px solid #e7efe9;
            font-weight: 600;
        }
        .hero-divider { border-color: var(--green-border); opacity: 1; }

        .section-card { padding: 24px; margin-bottom: 20px; }
        .section-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--green-dark);
            font-size: 1.08rem;
            font-weight: 800;
            margin: 0 0 20px;
        }
        .heading-icon {
            display: inline-flex;
            width: 36px;
            height: 36px;
            align-items: center;
            justify-content: center;
            color: var(--green);
            background: var(--green-soft);
            border-radius: 10px;
            font-size: 1.05rem;
        }
        .job-description {
            color: #394940;
            line-height: 1.85;
            overflow-wrap: anywhere;
        }
        .skill-pill {
            padding: 8px 12px;
            margin: 0 6px 8px 0;
            color: var(--green);
            background: var(--green-soft);
            border: 1px solid #d6e7dc;
            font-weight: 650;
        }
        .info-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
        .info-item {
            min-width: 0;
            padding: 14px;
            background: #f8faf9;
            border: 1px solid #eaf0ec;
            border-radius: 12px;
        }
        .info-label {
            color: var(--muted);
            font-size: .78rem;
            margin-bottom: 6px;
        }
        .info-value {
            color: var(--ink);
            font-weight: 700;
            overflow-wrap: anywhere;
        }
        .sidebar-card { padding: 22px; margin-bottom: 20px; }
        .company-top { text-align: center; padding-bottom: 18px; border-bottom: 1px solid var(--green-border); }
        .company-top .company-logo { margin-bottom: 12px; }
        .company-description { color: #4e6056; font-size: .91rem; line-height: 1.75; overflow-wrap: anywhere; }
        .company-detail {
            display: flex;
            gap: 11px;
            align-items: flex-start;
            padding: 12px 0;
            border-bottom: 1px solid #edf2ee;
        }
        .company-detail:last-child { border-bottom: 0; padding-bottom: 0; }
        .company-detail > i {
            width: 18px;
            margin-top: 2px;
            color: var(--green);
            text-align: center;
        }
        .company-detail-content { min-width: 0; }
        .company-detail .info-label { margin-bottom: 3px; }
        .company-detail a { text-decoration: none; overflow-wrap: anywhere; }
        .company-detail a:hover { text-decoration: underline; }
        .summary-line {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 11px 0;
            border-bottom: 1px solid #edf2ee;
            font-size: .9rem;
        }
        .summary-line:last-child { border-bottom: 0; }
        .summary-line span { color: var(--muted); }
        .summary-line strong { text-align: right; overflow-wrap: anywhere; }
        .apply-card {
            padding: 22px;
            background: linear-gradient(145deg, #fff, #f3f8f5);
            border: 1px solid var(--green-border);
            border-radius: 18px;
            box-shadow: var(--shadow);
        }
        .apply-card h3 { color: var(--green-dark); font-size: 1.1rem; font-weight: 800; }
        .apply-card p { color: var(--muted); font-size: .9rem; line-height: 1.65; }
        .muted { color: var(--muted); }
        footer {
            margin-top: 28px;
            padding: 22px 0;
            background: #fff;
            border-top: 1px solid var(--green-border);
            color: var(--muted);
            font-size: .85rem;
        }
        @media (min-width: 992px) {
            .sticky-sidebar { position: sticky; top: 92px; }
        }
        @media (max-width: 767.98px) {
            .company-logo { width: 68px; height: 68px; flex-basis: 68px; }
            .section-card, .sidebar-card { padding: 18px; }
            .info-grid { gap: 9px; }
            .info-item { padding: 11px; }
        }
        @media (max-width: 420px) {
            .info-grid { grid-template-columns: 1fr; }
            .hero-actions { width: 100%; }
            .hero-actions .btn { flex: 1; }
        }
    </style>
</head>

<body>
@php
    $logo = $job->company_logo ?? null;
    $logoUrl = $logo
        ? (\Illuminate\Support\Str::startsWith($logo, ['http://', 'https://'])
            ? $logo
            : asset('storage/' . ltrim($logo, '/')))
        : null;

    $skills = $job->skills ?? [];
    if (is_string($skills)) {
        $skills = array_filter(array_map('trim', explode(',', $skills)));
    }
    if (!is_array($skills)) {
        $skills = [];
    }

    $salaryMin = $job->salary_min_lpa ?? null;
    $salaryMax = $job->salary_max_lpa ?? null;
    $experienceMin = $job->experience_min ?? null;
    $experienceMax = $job->experience_max ?? null;

    $salaryLabel = 'Not disclosed';
    if ($salaryMin !== null && $salaryMax !== null) {
        $salaryLabel = '₹' . number_format((float) $salaryMin, 2) . ' – ₹' . number_format((float) $salaryMax, 2) . ' LPA';
    } elseif ($salaryMin !== null) {
        $salaryLabel = 'From ₹' . number_format((float) $salaryMin, 2) . ' LPA';
    } elseif ($salaryMax !== null) {
        $salaryLabel = 'Up to ₹' . number_format((float) $salaryMax, 2) . ' LPA';
    }

    $experienceLabel = 'Not specified';
    if ($experienceMin !== null && $experienceMax !== null) {
        $experienceLabel = $experienceMin . '–' . $experienceMax . ' years';
    } elseif ($experienceMin !== null) {
        $experienceLabel = $experienceMin . '+ years';
    } elseif ($experienceMax !== null) {
        $experienceLabel = 'Up to ' . $experienceMax . ' years';
    }

    $companyLogo = $company->company_logo ?? null;
    $companyLogoUrl = $companyLogo
        ? (\Illuminate\Support\Str::startsWith($companyLogo, ['http://', 'https://'])
            ? $companyLogo
            : asset('storage/' . ltrim($companyLogo, '/')))
        : null;

    $companyWebsite = trim((string) ($company->website ?? ''));
    $companyWebsiteUrl = $companyWebsite
        ? (preg_match('/^https?:\/\//i', $companyWebsite) ? $companyWebsite : 'https://' . $companyWebsite)
        : null;
@endphp

<nav class="navbar navbar-expand sticky-top">
    <div class="container page-wrap">
        <a class="brand" href="{{ url('/') }}">Job<span>Bridge</span></a>
        <div class="ms-auto d-flex gap-2 hero-actions">
            <a href="{{ route('candidate.jobs.index') }}" class="btn btn-outline-green px-3 py-2">
                <i class="bi bi-arrow-left me-1"></i><span class="d-none d-sm-inline">All Jobs</span><span class="d-sm-none">Jobs</span>
            </a>
        </div>
    </div>
</nav>

<main class="container page-wrap py-4 py-lg-5">
    <nav aria-label="breadcrumb" class="mb-3">
        <div class="breadcrumb mb-0">
            <a href="{{ route('candidate.jobs.index') }}">Jobs</a>
            <span class="mx-2 muted">/</span>
            <span class="muted">Job Details</span>
        </div>
    </nav>

    <!-- Job overview -->
    <section class="surface job-hero mb-4">
        <div class="d-flex flex-column flex-md-row align-items-md-start gap-3 gap-md-4">
            @if($logoUrl)
                <img src="{{ $logoUrl }}" alt="{{ $job->company_name ?? 'Company' }} logo"
                     class="company-logo" onerror="this.onerror=null;this.style.display='none';">
            @else
                <div class="company-logo logo-placeholder">
                    <i class="bi bi-building fs-2"></i>
                </div>
            @endif

            <div class="flex-grow-1 min-w-0">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                    @if(!empty($job->status))
                        <span class="status-pill">{{ $job->status }}</span>
                    @endif
                    @if(!empty($job->job_type))
                        <span class="meta-pill">{{ $job->job_type }}</span>
                    @endif
                    @if(!empty($job->work_mode))
                        <span class="meta-pill">{{ $job->work_mode }}</span>
                    @endif
                </div>

                <h1 class="job-title mb-2">{{ $job->job_title ?? 'Job Title Not Available' }}</h1>
                <div class="company-name mb-3">
                    <i class="bi bi-building me-1 text-success"></i>
                    {{ $job->company_name ?? 'Company Not Available' }}
                </div>

                <div class="hero-meta">
                    @if(!empty($job->location))
                        <span><i class="bi bi-geo-alt me-1"></i>{{ $job->location }}</span>
                    @endif
                    <span><i class="bi bi-currency-rupee me-1"></i>{{ $salaryLabel }}</span>
                    <span><i class="bi bi-clock me-1"></i>{{ $experienceLabel }}</span>
                    @if(!empty($job->created_at))
                        <span><i class="bi bi-calendar3 me-1"></i>Posted {{ $job->created_at->format('d M Y') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <hr class="hero-divider my-4">

        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="info-item h-100">
                    <div class="info-label"><i class="bi bi-currency-rupee me-1"></i>Salary Range</div>
                    <div class="info-value">{{ $salaryLabel }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="info-item h-100">
                    <div class="info-label"><i class="bi bi-clock me-1"></i>Experience</div>
                    <div class="info-value">{{ $experienceLabel }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="info-item h-100">
                    <div class="info-label"><i class="bi bi-people me-1"></i>Vacancies</div>
                    <div class="info-value">{{ $job->total_vacancies ?? 'Not specified' }}</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="info-item h-100">
                    <div class="info-label"><i class="bi bi-mortarboard me-1"></i>Qualification</div>
                    <div class="info-value">{{ $job->qualification ?? 'Not specified' }}</div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
            <a href="{{ route('candidate.jobs.apply', ['id' => (string) $job->_id]) }}" class="btn btn-green px-4 py-2">
                <i class="bi bi-send me-2"></i>Apply for this Job
            </a>
            <a href="{{ route('candidate.jobs.index') }}" class="btn btn-outline-green px-4 py-2">
                <i class="bi bi-search me-2"></i>Explore More Jobs
            </a>
        </div>
    </section>

    <div class="row g-4 align-items-start">
        <!-- Main content -->
        <div class="col-lg-8">
            <section class="surface section-card">
                <h2 class="section-heading"><span class="heading-icon"><i class="bi bi-file-text"></i></span>Job Description</h2>
                @if(!empty($job->description))
                    <div class="job-description">{!! nl2br(e($job->description)) !!}</div>
                @else
                    <p class="muted mb-0">No job description has been provided.</p>
                @endif
            </section>

            <section class="surface section-card">
                <h2 class="section-heading"><span class="heading-icon"><i class="bi bi-tools"></i></span>Required Skills</h2>
                @forelse($skills as $skill)
                    <span class="skill-pill">{{ $skill }}</span>
                @empty
                    <p class="muted mb-0">Required skills have not been specified.</p>
                @endforelse
            </section>

            <section class="surface section-card">
                <h2 class="section-heading"><span class="heading-icon"><i class="bi bi-clipboard-data"></i></span>Job Information</h2>
                <div class="info-grid">
                    <div class="info-item"><div class="info-label">Job Title</div><div class="info-value">{{ $job->job_title ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Employment Type</div><div class="info-value">{{ $job->job_type ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Work Mode</div><div class="info-value">{{ $job->work_mode ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Job Location</div><div class="info-value">{{ $job->location ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Minimum Experience</div><div class="info-value">{{ $experienceMin !== null ? $experienceMin . ' years' : 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Maximum Experience</div><div class="info-value">{{ $experienceMax !== null ? $experienceMax . ' years' : 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Minimum Salary</div><div class="info-value">{{ $salaryMin !== null ? '₹' . number_format((float) $salaryMin, 2) . ' LPA' : 'Not disclosed' }}</div></div>
                    <div class="info-item"><div class="info-label">Maximum Salary</div><div class="info-value">{{ $salaryMax !== null ? '₹' . number_format((float) $salaryMax, 2) . ' LPA' : 'Not disclosed' }}</div></div>
                    <div class="info-item"><div class="info-label">Total Vacancies</div><div class="info-value">{{ $job->total_vacancies ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Qualification</div><div class="info-value">{{ $job->qualification ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Job Status</div><div class="info-value text-capitalize">{{ $job->status ?? 'Not specified' }}</div></div>
                    <div class="info-item"><div class="info-label">Posted Date</div><div class="info-value">{{ !empty($job->created_at) ? $job->created_at->format('d M Y') : 'Not available' }}</div></div>
                </div>
            </section>
        </div>

        <!-- Sidebar -->
        <aside class="col-lg-4">
            <div class="sticky-sidebar">
                <section class="surface sidebar-card">
                    <h2 class="section-heading"><span class="heading-icon"><i class="bi bi-buildings"></i></span>About the Company</h2>

                    @if($company)
                        <div class="company-top">
                            @if($companyLogoUrl)
                                <img src="{{ $companyLogoUrl }}" alt="{{ $company->company_name ?? 'Company' }} logo"
                                     class="company-logo" onerror="this.onerror=null;this.style.display='none';">
                            @else
                                <div class="company-logo logo-placeholder mx-auto"><i class="bi bi-building fs-2"></i></div>
                            @endif
                            <h3 class="h5 fw-bold mb-2">{{ $company->company_name ?? $job->company_name ?? 'Company Name Not Available' }}</h3>
                            @if(!empty($company->industry))
                                <span class="skill-pill">{{ $company->industry }}</span>
                            @endif
                        </div>

                        <div class="pt-3">
                            <div class="company-description mb-3">
                                @if(!empty($company->company_description))
                                    {!! nl2br(e($company->company_description)) !!}
                                @else
                                    <span class="muted">Company description not provided.</span>
                                @endif
                            </div>

                            <div class="company-detail">
                                <i class="bi bi-people"></i>
                                <div class="company-detail-content">
                                    <div class="info-label">Company Size</div>
                                    <div class="info-value">{{ $company->company_size ?? 'Not provided' }}</div>
                                </div>
                            </div>
                            <div class="company-detail">
                                <i class="bi bi-calendar-event"></i>
                                <div class="company-detail-content">
                                    <div class="info-label">Founded</div>
                                    <div class="info-value">{{ $company->founded_year ?? 'Not provided' }}</div>
                                </div>
                            </div>
                            <div class="company-detail">
                                <i class="bi bi-geo-alt"></i>
                                <div class="company-detail-content">
                                    <div class="info-label">Address</div>
                                    <div class="info-value">{{ $company->address ?? 'Not provided' }}</div>
                                    <div class="muted small">{{ collect([$company->city ?? null, $company->state ?? null, $company->country ?? null])->filter()->implode(', ') ?: 'Location not provided' }}</div>
                                </div>
                            </div>
                            <div class="company-detail">
                                <i class="bi bi-envelope"></i>
                                <div class="company-detail-content">
                                    <div class="info-label">Company Email</div>
                                    @if(!empty($company->company_email))
                                        <a href="mailto:{{ $company->company_email }}">{{ $company->company_email }}</a>
                                    @else
                                        <div class="info-value">Not provided</div>
                                    @endif
                                </div>
                            </div>
                            <div class="company-detail">
                                <i class="bi bi-telephone"></i>
                                <div class="company-detail-content">
                                    <div class="info-label">Phone</div>
                                    @if(!empty($company->phone))
                                        <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a>
                                    @else
                                        <div class="info-value">Not provided</div>
                                    @endif
                                </div>
                            </div>
                            @if($companyWebsiteUrl)
                                <div class="company-detail">
                                    <i class="bi bi-globe"></i>
                                    <div class="company-detail-content">
                                        <div class="info-label">Website</div>
                                        <a href="{{ $companyWebsiteUrl }}" target="_blank" rel="noopener noreferrer">
                                            {{ $companyWebsite }} <i class="bi bi-box-arrow-up-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($company->linkedin_url))
                                <div class="company-detail">
                                    <i class="bi bi-linkedin"></i>
                                    <div class="company-detail-content">
                                        <div class="info-label">LinkedIn</div>
                                        <a href="{{ $company->linkedin_url }}" target="_blank" rel="noopener noreferrer">View company profile <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="text-center py-3">
                            <div class="company-logo logo-placeholder mx-auto mb-3"><i class="bi bi-building fs-2"></i></div>
                            <h3 class="h6 fw-bold">Company information unavailable</h3>
                            <p class="muted small mb-0">The company profile linked to this job could not be found.</p>
                        </div>
                    @endif
                </section>

                <section class="surface sidebar-card">
                    <h2 class="section-heading"><span class="heading-icon"><i class="bi bi-list-check"></i></span>Quick Summary</h2>
                    <div class="summary-line"><span>Employment</span><strong>{{ $job->job_type ?? 'Not specified' }}</strong></div>
                    <div class="summary-line"><span>Work Mode</span><strong>{{ $job->work_mode ?? 'Not specified' }}</strong></div>
                    <div class="summary-line"><span>Vacancies</span><strong>{{ $job->total_vacancies ?? 'Not specified' }}</strong></div>
                    <div class="summary-line"><span>Experience</span><strong>{{ $experienceLabel }}</strong></div>
                    <div class="summary-line"><span>Status</span><strong class="text-capitalize">{{ $job->status ?? 'Unknown' }}</strong></div>
                </section>

                <section class="apply-card">
                    <h3><i class="bi bi-send me-2"></i>Interested in this role?</h3>
                    <p class="mb-3">Submit your application and share your profile with the hiring team.</p>
                    <a href="{{ route('candidate.jobs.apply', ['id' => (string) $job->_id]) }}" class="btn btn-green w-100 py-2">
                        Apply Now <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <p class="small text-center mt-3 mb-0"><i class="bi bi-shield-check me-1"></i>Your application details are handled securely.</p>
                </section>
            </div>
        </aside>
    </div>
</main>

<footer>
    <div class="container page-wrap text-center">
        © {{ date('Y') }} JobBridge. Connecting talent with opportunity.
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Application Submitted!',
        text: @json(session('success')),
        icon: 'success',
        confirmButtonText: 'Done',
        confirmButtonColor: '#21604A',
        allowOutsideClick: false
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: 'Notice',
        text: @json(session('error')),
        icon: 'info',
        confirmButtonText: 'OK',
        confirmButtonColor: '#21604A'
    });
</script>
@endif
</body>
</html>
