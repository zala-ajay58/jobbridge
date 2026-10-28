<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Profile | JobBridge</title>

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
            --border: #e4ebe6;
            --text: #24332a;
            --muted: #758078;
            --danger-bg: #fff1f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--text);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        /* Navigation */
        .main-navbar {
            background: rgba(255, 255, 255, .97);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-inner {
            min-height: 70px;
            gap: 18px;
        }

        .brand {
            color: var(--green);
            font-size: 25px;
            font-weight: 850;
            letter-spacing: -.8px;
            white-space: nowrap;
        }

        .brand:hover {
            color: var(--dark-green);
        }

        .brand-icon {
            display: inline-flex;
            width: 37px;
            height: 37px;
            align-items: center;
            justify-content: center;
            margin-right: 7px;
            background: var(--light-green);
            border-radius: 11px;
            font-size: 19px;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 9px;
        }

        .btn {
            border-radius: 9px;
            padding: 9px 13px;
            font-size: 13px;
            font-weight: 650;
            transition: .2s ease;
        }

        .btn-green {
            background: var(--green);
            color: #fff;
            border: 1px solid var(--green);
        }

        .btn-green:hover,
        .btn-green:focus {
            background: var(--dark-green);
            color: #fff;
            border-color: var(--dark-green);
        }

        .btn-soft {
            background: var(--light-green);
            border: 1px solid #dce9df;
            color: var(--green);
        }

        .btn-soft:hover {
            background: #dcebe1;
            color: var(--dark-green);
        }

        .btn-outline-danger {
            border-color: #f0c9c7;
            color: #bd3434;
            background: #fff;
        }

        .btn-outline-danger:hover {
            background: #fff0ef;
            color: #a52020;
            border-color: #e9b3b0;
        }

        /* Page */
        .page-wrapper {
            max-width: 1140px;
            margin: auto;
            padding: 30px 18px 45px;
        }

        .page-heading {
            font-size: 27px;
            font-weight: 800;
            letter-spacing: -.7px;
            margin: 0 0 5px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 14px;
            margin: 0;
        }

        .heading-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 43px;
            height: 43px;
            margin-right: 12px;
            background: var(--light-green);
            color: var(--green);
            border-radius: 12px;
            font-size: 21px;
            flex-shrink: 0;
        }

        .page-intro {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 23px;
        }

        /* Cards */
        .profile-card,
        .details-card {
            height: 100%;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: 0 5px 22px rgba(25, 61, 41, .045);
            overflow: hidden;
        }

        /* Profile summary */
        .profile-banner {
            height: 115px;
            position: relative;
            background:
                radial-gradient(circle at 85% 20%, rgba(255,255,255,.15) 0 35px, transparent 36px),
                radial-gradient(circle at 70% 100%, rgba(255,255,255,.10) 0 75px, transparent 76px),
                linear-gradient(125deg, #144432, #21604A 55%, #3c8968);
        }

        .banner-label {
            position: absolute;
            top: 17px;
            right: 17px;
            color: rgba(255,255,255,.9);
            border: 1px solid rgba(255,255,255,.28);
            background: rgba(255,255,255,.10);
            border-radius: 30px;
            padding: 6px 10px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .3px;
        }

        .profile-content {
            padding: 0 23px 23px;
        }

        .avatar {
            width: 94px;
            height: 94px;
            margin-top: -47px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 5px solid #fff;
            border-radius: 50%;
            object-fit: cover;
            background: var(--light-green);
            color: var(--green);
            font-size: 39px;
            box-shadow: 0 3px 12px rgba(0,0,0,.07);
        }

        .profile-name {
            font-size: 21px;
            font-weight: 800;
            line-height: 1.4;
            overflow-wrap: anywhere;
            margin: 15px 0 9px;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border: 1px solid #d8e9dd;
            border-radius: 30px;
            background: var(--light-green);
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .verified-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #2d8b58;
        }

        .profile-email {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin: 19px 0 21px;
            color: #68766d;
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .profile-email i {
            color: var(--green);
            font-size: 16px;
            margin-top: 1px;
        }

        .profile-actions {
            display: grid;
            gap: 10px;
        }

        .profile-actions .btn {
            min-height: 42px;
        }

        .profile-divider {
            border-top: 1px solid #edf1ee;
            margin: 22px 0 17px;
        }

        .account-note {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .account-note i {
            color: var(--green);
            font-size: 15px;
            flex-shrink: 0;
        }

        /* Personal information */
        .details-card {
            padding: 25px;
        }

        .details-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-bottom: 19px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 8px;
        }

        .details-title {
            display: flex;
            align-items: center;
            gap: 11px;
            font-size: 18px;
            font-weight: 800;
            margin: 0;
        }

        .details-title-icon {
            width: 39px;
            height: 39px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--light-green);
            color: var(--green);
            border-radius: 11px;
            font-size: 19px;
        }

        .details-count {
            color: var(--muted);
            font-size: 12px;
            white-space: nowrap;
        }

        .personal-info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 25px;
        }

        .info-item {
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 17px 0;
            border-bottom: 1px solid #edf1ee;
        }

        .info-item:nth-last-child(-n+2) {
            border-bottom-color: transparent;
        }

        .info-icon {
            width: 41px;
            height: 41px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: #f0f6f2;
            border: 1px solid #e5eee7;
            border-radius: 12px;
            color: var(--green);
            font-size: 18px;
        }

        .info-content {
            min-width: 0;
            flex: 1;
        }

        .info-label {
            margin-bottom: 5px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 650;
            letter-spacing: .35px;
            text-transform: uppercase;
        }

        .info-value {
            color: var(--text);
            font-size: 14px;
            font-weight: 650;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .info-value.muted-value {
            color: #929b95;
            font-weight: 500;
        }

        /* Alert */
        .alert {
            border: 1px solid #cfe7d5;
            border-radius: 11px;
        }

        /* Delete modal */
        .modal-content {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 18px 60px rgba(0,0,0,.15);
        }

        .delete-icon {
            width: 53px;
            height: 53px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            background: var(--danger-bg);
            color: #bd3434;
            border-radius: 50%;
            font-size: 24px;
        }

        .modal-title {
            font-weight: 800;
        }

        /* Responsive */
        @media (max-width: 767px) {
            .navbar-inner {
                padding-top: 12px;
                padding-bottom: 12px;
                align-items: flex-start !important;
                flex-direction: column;
            }

            .nav-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .nav-actions .btn {
                flex: 1 1 auto;
                text-align: center;
            }

            .page-wrapper {
                padding: 24px 14px 35px;
            }

            .page-heading {
                font-size: 23px;
            }

            .page-intro {
                align-items: flex-start;
            }

            .profile-banner {
                height: 95px;
            }

            .profile-content {
                padding: 0 19px 20px;
            }

            .details-card {
                padding: 20px 18px;
            }

            .personal-info-grid {
                grid-template-columns: 1fr;
            }

            .info-item:nth-last-child(-n+2) {
                border-bottom-color: #edf1ee;
            }

            .info-item:last-child {
                border-bottom-color: transparent;
            }

            .details-header {
                align-items: flex-start;
            }
        }

        @media (max-width: 420px) {
            .brand {
                font-size: 22px;
            }

            .nav-actions {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .nav-actions .btn {
                padding: 9px 7px;
                font-size: 11px;
            }

            .nav-actions form {
                display: contents;
            }

            .nav-actions form button {
                width: 100%;
            }

            .page-intro {
                gap: 9px;
            }

            .heading-icon {
                width: 37px;
                height: 37px;
                margin-right: 8px;
            }

            .details-count {
                display: none;
            }
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

    $fullName = $fullName ?: 'JobBridge User';

    $role = $user->role ?? 'candidate';

    $genders = [
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other',
        'prefer_not_to_say' => 'Prefer not to say',
    ];

    $genderLabel = $genders[$user->gender ?? ''] ?? null;

    $dobLabel = null;

    if (!empty($user->dob)) {
        try {
            $dobLabel = \Illuminate\Support\Carbon::parse($user->dob)->format('d M Y');
        } catch (\Throwable $e) {
            $dobLabel = null;
        }
    }
@endphp

<!-- Navigation -->
<nav class="main-navbar">
    <div class="container navbar-inner d-flex align-items-center justify-content-between">

        @if($role === 'recruiter')
            <a href="{{ route('recruiter.dashboard') }}" class="brand">
                <span class="brand-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </span>JobBridge
            </a>
        @else
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">
                    <i class="bi bi-briefcase-fill"></i>
                </span>JobBridge
            </a>
        @endif

        <div class="nav-actions">
            @if($role === 'recruiter')
                <a href="{{ route('recruiter.dashboard') }}" class="btn btn-green">
                    <i class="bi bi-speedometer2 me-1"></i>
                    Recruiter Dashboard
                </a>
            @else
                <a href="{{ route('candidate.applications.index') }}" class="btn btn-soft">
                    <i class="bi bi-file-earmark-check me-1"></i>
                    My Applications
                </a>

                <a href="{{ route('home') }}" class="btn btn-green">
                    <i class="bi bi-house-door me-1"></i>
                    Home
                </a>
            @endif

            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button class="btn btn-soft" type="submit">
                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout
                </button>
            </form>
        </div>

    </div>
</nav>

<main class="page-wrapper">

    <!-- Heading -->
    <div class="page-intro">
        <div class="d-flex align-items-center">
            <span class="heading-icon">
                <i class="bi bi-person-badge"></i>
            </span>

            <div>
                <h1 class="page-heading">My Profile</h1>
                <p class="page-subtitle">
                    Manage your personal information and account settings.
                </p>
            </div>
        </div>
    </div>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">

        <!-- Profile summary -->
        <div class="col-lg-4 col-md-5">
            <section class="profile-card">

                <div class="profile-banner">
                    <span class="banner-label">
                        <i class="bi bi-shield-check me-1"></i>
                        JOBBRIDGE ACCOUNT
                    </span>
                </div>

                <div class="profile-content">

                    <!-- Avatar -->
                    @if(!empty($user->profile_photo))
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            alt="Profile photo"
                            class="avatar"
                        >
                    @else
                        <div class="avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif

                    <h2 class="profile-name">{{ $fullName }}</h2>

                    <span class="role-badge">
                        <span class="verified-dot"></span>
                        {{ str_replace('_', ' ', $role) }}
                    </span>

                    <div class="profile-email">
                        <i class="bi bi-envelope"></i>
                        <span>{{ $user->email ?: 'Email not provided' }}</span>
                    </div>

                    <div class="profile-actions">
                        <a href="{{ route('profile.edit') }}" class="btn btn-green">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Profile
                        </a>

                        <button type="button"
                                class="btn btn-outline-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteProfileModal">
                            <i class="bi bi-trash3 me-2"></i>
                            Delete Profile
                        </button>
                    </div>

                    <div class="profile-divider"></div>

                    <div class="account-note">
                        <i class="bi bi-info-circle"></i>
                        <span>
                            Keep your contact details up to date so your JobBridge
                            account information stays accurate.
                        </span>
                    </div>

                </div>
            </section>
        </div>

        <!-- Personal information -->
        <div class="col-lg-8 col-md-7">
            <section class="details-card">

                <div class="details-header">
                    <h2 class="details-title">
                        <span class="details-title-icon">
                            <i class="bi bi-person-lines-fill"></i>
                        </span>
                        Personal Information
                    </h2>

                    <span class="details-count">
                        <i class="bi bi-shield-check me-1"></i>
                        Account details
                    </span>
                </div>

                <div class="personal-info-grid">

                    <!-- First name -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">First Name</div>
                            <div class="info-value {{ empty($user->first_name) ? 'muted-value' : '' }}">
                                {{ $user->first_name ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Middle name -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Middle Name</div>
                            <div class="info-value {{ empty($user->middle_name) ? 'muted-value' : '' }}">
                                {{ $user->middle_name ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Last name -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Last Name</div>
                            <div class="info-value {{ empty($user->last_name) ? 'muted-value' : '' }}">
                                {{ $user->last_name ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Email Address</div>
                            <div class="info-value {{ empty($user->email) ? 'muted-value' : '' }}">
                                {{ $user->email ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value {{ empty($user->phone) ? 'muted-value' : '' }}">
                                {{ $user->phone ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-gender-ambiguous"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Gender</div>
                            <div class="info-value {{ empty($genderLabel) ? 'muted-value' : '' }}">
                                {{ $genderLabel ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Date of birth -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-calendar-event"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value {{ empty($dobLabel) ? 'muted-value' : '' }}">
                                {{ $dobLabel ?: 'Not provided' }}
                            </div>
                        </div>
                    </div>

                    <!-- Account type -->
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="bi bi-briefcase"></i>
                        </div>
                        <div class="info-content">
                            <div class="info-label">Account Type</div>
                            <div class="info-value text-capitalize">
                                {{ str_replace('_', ' ', $role) }}
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

    </div>
</main>

<!-- Delete confirmation modal -->
<div class="modal fade"
     id="deleteProfileModal"
     tabindex="-1"
     aria-labelledby="deleteProfileModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">

            <div class="modal-body text-center p-4">
                <div class="delete-icon">
                    <i class="bi bi-trash3"></i>
                </div>

                <h2 class="modal-title fs-5 mb-2" id="deleteProfileModalLabel">
                    Delete your account?
                </h2>

                <p class="text-secondary mb-4">
                    This action may permanently remove your account and associated
                    information. You may not be able to recover it.
                </p>

                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <button type="button"
                            class="btn btn-light border"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <form action="{{ route('profile.destroy') }}"
                          method="POST"
                          class="m-0">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">
                            <i class="bi bi-trash3 me-1"></i>
                            Yes, Delete Account
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>