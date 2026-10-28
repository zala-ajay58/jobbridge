<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recruiter Dashboard | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --dark-green: #144432;
            --light-green: #edf5f0;
            --page-bg: #f5f8f6;
            --border: #e3ebe5;
            --muted: #718078;
            --text: #26372f;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--text);
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand {
            color: var(--green);
            font-size: 1.45rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -.6px;
        }

        .brand:hover { color: var(--dark-green); }

        .profile-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #dcebe1;
        }

        .avatar-placeholder {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--light-green);
            color: var(--green);
            font-size: 1.35rem;
        }

        .btn-green {
            background: var(--green);
            border: 1px solid var(--green);
            color: #fff;
            font-weight: 600;
            border-radius: 9px;
        }

        .btn-green:hover {
            background: var(--dark-green);
            border-color: var(--dark-green);
            color: #fff;
        }

        .btn-outline-green {
            background: #fff;
            color: var(--green);
            border: 1px solid #cbded1;
            font-weight: 600;
            border-radius: 9px;
        }

        .btn-outline-green:hover {
            background: var(--light-green);
            color: var(--dark-green);
            border-color: #b6d2c0;
        }

        .dashboard-container {
            max-width: 1240px;
        }

        .welcome-banner {
            position: relative;
            overflow: hidden;
            padding: 30px;
            border-radius: 18px;
            color: #fff;
            background: linear-gradient(120deg, #144432 0%, #21604A 58%, #347b5d 100%);
            box-shadow: 0 10px 28px rgba(20, 68, 50, .10);
        }

        .welcome-banner::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -70px;
            top: -100px;
            border: 35px solid rgba(255, 255, 255, .07);
            border-radius: 50%;
            pointer-events: none;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-label {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            margin-bottom: 16px;
            border: 1px solid rgba(255, 255, 255, .22);
            background: rgba(255, 255, 255, .12);
            border-radius: 30px;
            font-size: .8rem;
            font-weight: 600;
        }

        .welcome-banner h1 {
            font-size: clamp(1.55rem, 3vw, 2.15rem);
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .welcome-banner p {
            color: #e0eee6;
            max-width: 620px;
            margin-bottom: 0;
            line-height: 1.7;
        }

        .section-title {
            font-weight: 800;
            letter-spacing: -.3px;
        }

        .section-subtitle {
            color: var(--muted);
            font-size: .92rem;
        }

        .feature-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 23px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 15px;
            transition: transform .2s ease, box-shadow .2s ease,
                        border-color .2s ease;
        }

        .feature-card:hover {
            transform: translateY(-3px);
            border-color: #c5ddce;
            box-shadow: 0 10px 26px rgba(20, 68, 50, .07);
        }

        .feature-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 49px;
            height: 49px;
            flex-shrink: 0;
            margin-bottom: 19px;
            border-radius: 13px;
            background: var(--light-green);
            color: var(--green);
            font-size: 1.4rem;
        }

        .feature-card h3 {
            font-size: 1.08rem;
            font-weight: 750;
            margin-bottom: 9px;
        }

        .feature-card p {
            color: var(--muted);
            font-size: .9rem;
            line-height: 1.65;
            margin-bottom: 20px;
        }

        .feature-card .card-action {
            margin-top: auto;
        }

        .company-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            background: var(--light-green);
            color: var(--green);
            border-radius: 20px;
            font-size: .77rem;
            font-weight: 700;
        }

        .account-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .account-header {
            padding: 20px 23px;
            border-bottom: 1px solid var(--border);
        }

        .account-body { padding: 23px; }

        .detail-item {
            height: 100%;
            padding: 14px;
            border: 1px solid #eaf0ec;
            border-radius: 11px;
            background: #fbfcfb;
            overflow-wrap: anywhere;
        }

        .detail-label {
            display: block;
            margin-bottom: 6px;
            color: var(--muted);
            font-size: .79rem;
        }

        .detail-value {
            font-weight: 650;
            font-size: .92rem;
        }

        .page-footer {
            padding: 20px 0;
            color: var(--muted);
            font-size: .82rem;
            text-align: center;
        }

        @media (max-width: 575px) {
            .welcome-banner { padding: 23px 20px; }
            .feature-card { padding: 19px; }
            .account-body { padding: 17px; }
            .account-header { padding: 17px; }
            .brand { font-size: 1.25rem; }
        }
    </style>
</head>

<body>

@php
    $fullName = trim(
        ($user->first_name ?? '') . ' ' .
        ($user->middle_name ?? '') . ' ' .
        ($user->last_name ?? '')
    );

    $fullName = $fullName ?: 'Recruiter';
    $firstName = $user->first_name ?? 'Recruiter';

    $profilePhoto = $user->profile_photo ?? null;

    $profilePhotoUrl = $profilePhoto
        ? (preg_match('/^https?:\/\//i', $profilePhoto)
            ? $profilePhoto
            : asset('storage/' . ltrim($profilePhoto, '/')))
        : null;

    $hasCompany = isset($company) && $company;
@endphp

{{-- NAVBAR --}}
<nav class="navbar py-3">
    <div class="container dashboard-container">
        <a href="{{ route('recruiter.dashboard') }}" class="brand">
            <i class="bi bi-briefcase-fill me-2"></i>JobBridge
        </a>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('profile.show') }}" class="profile-link">
                @if($profilePhotoUrl)
                    <img src="{{ $profilePhotoUrl }}"
                         alt="Profile photo"
                         class="profile-avatar"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='inline-flex';">

                    <span class="avatar-placeholder" style="display:none">
                        <i class="bi bi-person"></i>
                    </span>
                @else
                    <span class="avatar-placeholder">
                        <i class="bi bi-person"></i>
                    </span>
                @endif

                <span class="d-none d-sm-inline">{{ $firstName }}</span>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn btn-green btn-sm px-3 py-2">
                    <i class="bi bi-box-arrow-right me-sm-1"></i>
                    <span class="d-none d-sm-inline">Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<main class="container dashboard-container py-4 py-lg-5">

    {{-- WELCOME BANNER --}}
    <section class="welcome-banner mb-4 mb-lg-5">
        <div class="welcome-content">
            <span class="welcome-label">
                <i class="bi bi-shield-check"></i>
                Recruiter Workspace
            </span>

            <h1 class="mb-2">Welcome back, {{ $firstName }}!</h1>

            <p>
                Manage your job openings, review candidate applications,
                and find the right people for your organization.
            </p>

            <div class="d-flex flex-wrap gap-2 mt-4">
                @if($hasCompany)
                    <a href="{{ route('recruiter.jobs.create') }}"
                       class="btn btn-light fw-semibold px-3 py-2">
                        <i class="bi bi-plus-circle me-1"></i>
                        Post a Job
                    </a>

                    <a href="{{ route('recruiter.company.edit') }}"
                       class="btn btn-outline-light px-3 py-2">
                        <i class="bi bi-building me-1"></i>
                        Edit Company
                    </a>
                @else
                    <a href="{{ route('recruiter.company.create') }}"
                       class="btn btn-light fw-semibold px-3 py-2">
                        <i class="bi bi-building-add me-1"></i>
                        Register Company
                    </a>
                @endif
            </div>
        </div>
    </section>

    {{-- DASHBOARD HEADING --}}
    <section class="mb-4">
        <div class="d-flex flex-wrap align-items-end justify-content-between gap-2">
            <div>
                <h2 class="h4 section-title mb-1">Your Recruitment Workspace</h2>
                <p class="section-subtitle mb-0">
                    Everything you need to manage your hiring activities.
                </p>
            </div>

            @if($hasCompany)
                <span class="company-status">
                    <i class="bi bi-check-circle-fill"></i>
                    Company Registered
                </span>
            @else
                <span class="badge text-bg-warning">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    Company Setup Required
                </span>
            @endif
        </div>
    </section>

    {{-- FEATURE CARDS --}}
    <section class="row g-3 g-lg-4">

        {{-- COMPANY --}}
        <div class="col-12 col-md-6 col-lg-4">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-building"></i>
                </div>

                <h3>{{ $hasCompany ? 'Company Profile' : 'Register Your Company' }}</h3>

                <p>
                    @if($hasCompany)
                        Keep your company information up to date for candidates
                        viewing your job listings.
                    @else
                        Add your company information before publishing job
                        openings on JobBridge.
                    @endif
                </p>

                <div class="card-action">
                    @if($hasCompany)
                        <a href="{{ route('recruiter.company.edit') }}"
                           class="btn btn-outline-green w-100 py-2">
                            <i class="bi bi-pencil-square me-1"></i>
                            Edit Company Details
                        </a>
                    @else
                        <a href="{{ route('recruiter.company.create') }}"
                           class="btn btn-green w-100 py-2">
                            <i class="bi bi-building-add me-1"></i>
                            Register Company
                        </a>
                    @endif
                </div>
            </article>
        </div>

        {{-- POST JOB --}}
        <div class="col-12 col-md-6 col-lg-4">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-plus-circle"></i>
                </div>

                <h3>Post a New Job</h3>

                <p>
                    Publish an opportunity with job requirements, salary,
                    experience, location, and employment details.
                </p>

                <div class="card-action">
                    @if($hasCompany)
                        <a href="{{ route('recruiter.jobs.create') }}"
                           class="btn btn-green w-100 py-2">
                            <i class="bi bi-plus-lg me-1"></i>
                            Create Job Listing
                        </a>
                    @else
                        <a href="{{ route('recruiter.company.create') }}"
                           class="btn btn-outline-green w-100 py-2">
                            <i class="bi bi-lock me-1"></i>
                            Register Company First
                        </a>
                    @endif
                </div>
            </article>
        </div>

        {{-- MANAGE JOBS --}}
        <div class="col-12 col-md-6 col-lg-4">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-briefcase"></i>
                </div>

                <h3>Manage Job Listings</h3>

                <p>
                    View your published jobs, update job details,
                    and manage your open and closed positions.
                </p>

                <div class="card-action">
                    <a href="{{ route('recruiter.jobs.index') }}"
                       class="btn btn-outline-green w-100 py-2">
                        <i class="bi bi-list-check me-1"></i>
                        Manage My Jobs
                    </a>
                </div>
            </article>
        </div>

        {{-- APPLICATIONS --}}
        <div class="col-12 col-md-6 col-lg-4">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-people"></i>
                </div>

                <h3>Candidate Applications</h3>

                <p>
                    Review submitted applications, inspect candidate
                    information, and follow up with potential hires.
                </p>

                <div class="card-action">
                    <a href="{{ route('recruiter.applications.index') }}"
                       class="btn btn-outline-green w-100 py-2">
                        <i class="bi bi-clipboard-check me-1"></i>
                        View Applications
                    </a>
                </div>
            </article>
        </div>

        {{-- PROFILE --}}
        <div class="col-12 col-md-6 col-lg-4">
            <article class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-person-gear"></i>
                </div>

                <h3>My Profile</h3>

                <p>
                    Review your personal information, update your profile
                    photo, and keep your account details current.
                </p>

                <div class="card-action">
                    <a href="{{ route('profile.show') }}"
                       class="btn btn-outline-green w-100 py-2">
                        <i class="bi bi-person me-1"></i>
                        View My Profile
                    </a>
                </div>
            </article>
        </div>

    </section>

    {{-- ACCOUNT DETAILS --}}
    <section class="account-card mt-4 mt-lg-5">
        <div class="account-header d-flex flex-wrap align-items-center justify-content-between gap-2">
            <div>
                <h2 class="h5 fw-bold mb-1">Recruiter Account Details</h2>
                <p class="section-subtitle mb-0">
                    Your registered account information.
                </p>
            </div>

            <i class="bi bi-person-vcard fs-3 text-success"></i>
        </div>

        <div class="account-body">
            <div class="row g-3">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-person me-1"></i> Full Name
                        </span>
                        <div class="detail-value">{{ $fullName }}</div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-envelope me-1"></i> Email Address
                        </span>
                        <div class="detail-value">{{ $user->email ?? 'Not available' }}</div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="detail-item">
                        <span class="detail-label">
                            <i class="bi bi-shield-check me-1"></i> Account Type
                        </span>
                        <div class="detail-value text-capitalize">
                            {{ $user->role ?? 'Recruiter' }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-3">
                <a href="{{ route('profile.show') }}"
                   class="btn btn-outline-green btn-sm px-3 py-2">
                    <i class="bi bi-pencil-square me-1"></i>
                    View or Update Profile
                </a>
            </div>
        </div>
    </section>

    <footer class="page-footer">
        <i class="bi bi-briefcase-fill me-1"></i>
        JobBridge &mdash; Connecting talent with opportunity.
    </footer>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>