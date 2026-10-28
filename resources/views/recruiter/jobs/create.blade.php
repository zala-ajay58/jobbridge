<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Post a Job | JobBridge</title>

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
            --border: #e1e9e3;
            --text: #26362c;
            --muted: #748078;
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

        /* Navbar */
        .main-navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-inner {
            min-height: 68px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--green);
            font-size: 24px;
            font-weight: 850;
            letter-spacing: -.7px;
            text-decoration: none;
        }

        .brand:hover {
            color: var(--dark-green);
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 39px;
            height: 39px;
            border-radius: 11px;
            background: var(--light-green);
            font-size: 19px;
        }

        .btn {
            border-radius: 9px;
            padding: 9px 14px;
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
            border-color: var(--dark-green);
            color: #fff;
        }

        /* Page heading */
        .page-wrap {
            max-width: 1100px;
            margin: 28px auto 45px;
            padding: 0 18px;
        }

        .page-heading {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .heading-icon {
            width: 51px;
            height: 51px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-green);
            border: 1px solid #dce9df;
            color: var(--green);
            border-radius: 14px;
            font-size: 24px;
        }

        .page-heading h1 {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -.5px;
            margin: 0 0 5px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        /* Main card */
        .job-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(25, 61, 41, .055);
        }

        .form-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 26px;
            color: #fff;
            background:
                radial-gradient(circle at 90% 10%, rgba(255,255,255,.10) 0 65px, transparent 66px),
                linear-gradient(120deg, var(--dark-green), var(--green));
        }

        .form-header h2 {
            font-size: 19px;
            font-weight: 800;
            margin: 0 0 6px;
        }

        .form-header p {
            font-size: 12px;
            margin: 0;
            color: rgba(255,255,255,.83);
        }

        .header-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 14px;
            background: rgba(255,255,255,.12);
            font-size: 23px;
        }

        .card-body {
            padding: 25px 26px !important;
        }

        /* Company details */
        .company-box {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px;
            margin-bottom: 25px;
            background: #f5faf6;
            border: 1px solid #dce9df;
            border-radius: 13px;
        }

        .company-logo,
        .company-placeholder {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #fff;
        }

        .company-logo {
            object-fit: contain;
            padding: 5px;
        }

        .company-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green);
            font-size: 25px;
        }

        .company-details {
            min-width: 0;
            flex: 1;
        }

        .company-title {
            margin: 0 0 5px;
            font-size: 15px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .company-meta {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .company-website {
            display: inline-block;
            margin-top: 4px;
            font-size: 12px;
            overflow-wrap: anywhere;
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 7px 10px;
            border-radius: 30px;
            background: #e6f4e9;
            color: var(--green);
            font-size: 11px;
            font-weight: 750;
            white-space: nowrap;
        }

        /* Form sections */
        .section-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 13px;
            margin-bottom: 20px;
            border-bottom: 1px solid #eaf0eb;
        }

        .section-heading-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            background: var(--light-green);
            color: var(--green);
            border-radius: 10px;
            font-size: 17px;
        }

        .section-heading h3 {
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 3px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 11px;
            margin: 0;
        }

        .form-layout {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 22px;
            row-gap: 16px;
        }

        .field {
            min-width: 0;
        }

        .span-2 {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 7px;
            color: #35463b;
            font-size: 12px;
            font-weight: 750;
        }

        .required {
            color: #d33d3d;
        }

        .form-control,
        .form-select {
            min-height: 43px;
            padding: 10px 12px;
            border: 1px solid #dce5de;
            border-radius: 9px;
            background-color: #fff;
            color: var(--text);
            font-size: 13px;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #a0aaa3;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #5b9476;
            box-shadow: 0 0 0 3px rgba(33,96,74,.10);
        }

        textarea.form-control {
            min-height: 115px;
            resize: vertical;
            line-height: 1.65;
        }

        .form-text {
            margin-top: 6px;
            color: var(--muted);
            font-size: 11px;
        }

        .salary-prefix {
            display: flex;
            align-items: stretch;
        }

        .salary-prefix span {
            display: flex;
            align-items: center;
            padding: 0 12px;
            border: 1px solid #dce5de;
            border-right: 0;
            border-radius: 9px 0 0 9px;
            background: #f5f8f6;
            color: var(--muted);
            font-size: 12px;
        }

        .salary-prefix .form-control {
            border-radius: 0 9px 9px 0;
        }

        /* Footer actions */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #eaf0eb;
        }

        .required-note {
            color: var(--muted);
            font-size: 11px;
        }

        .footer-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-cancel {
            background: #fff;
            border: 1px solid #dce5de;
            color: #526157;
        }

        .btn-cancel:hover {
            background: #f5f8f6;
            color: var(--dark-green);
        }

        .btn-submit {
            min-width: 145px;
        }

        .btn-submit:disabled {
            opacity: .75;
            cursor: wait;
        }

        @media (max-width: 767px) {
            .page-wrap {
                margin-top: 22px;
                padding: 0 13px;
            }

            .form-header {
                padding: 18px;
            }

            .card-body {
                padding: 19px !important;
            }

            .company-box {
                align-items: flex-start;
            }

            .verified-badge {
                display: none;
            }

            .form-layout {
                grid-template-columns: 1fr;
                row-gap: 14px;
            }

            .span-2 {
                grid-column: auto;
            }

            .form-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .footer-actions {
                display: grid;
                grid-template-columns: 1fr 1.4fr;
            }

            .footer-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 420px) {
            .navbar-inner {
                gap: 10px;
            }

            .brand {
                font-size: 21px;
            }

            .page-heading h1 {
                font-size: 21px;
            }

            .heading-icon {
                width: 44px;
                height: 44px;
            }

            .form-header h2 {
                font-size: 17px;
            }

            .company-box {
                gap: 10px;
                padding: 11px;
            }

            .company-logo,
            .company-placeholder {
                width: 47px;
                height: 47px;
            }
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="main-navbar">
    <div class="container navbar-inner d-flex align-items-center justify-content-between">

        <a href="{{ route('recruiter.dashboard') }}" class="brand">
            <span class="brand-icon">
                <i class="bi bi-briefcase-fill"></i>
            </span>
            JobBridge
        </a>

        <a href="{{ route('recruiter.dashboard') }}"
           class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i>
            Dashboard
        </a>

    </div>
</nav>

<main class="page-wrap">

    <!-- Page heading -->
    <div class="page-heading">
        <div class="heading-icon">
            <i class="bi bi-plus-circle"></i>
        </div>

        <div>
            <h1>Post a New Job</h1>
            <p>Create a job listing and connect with the right candidates.</p>
        </div>
    </div>

    <div class="job-card">

        <!-- Card header -->
        <div class="form-header">
            <div>
                <h2>Job Posting Details</h2>
                <p>Complete the information below to publish your opportunity.</p>
            </div>

            <div class="header-icon">
                <i class="bi bi-briefcase"></i>
            </div>
        </div>

        <div class="card-body">

            <!-- Company information -->
            <div class="company-box">

                @if ($company->company_logo)
                    <img
                        src="{{ asset('storage/' . $company->company_logo) }}"
                        alt="Company logo"
                        class="company-logo"
                    >
                @else
                    <div class="company-placeholder">
                        <i class="bi bi-building"></i>
                    </div>
                @endif

                <div class="company-details">
                    <h2 class="company-title">
                        {{ $company->company_name }}
                    </h2>

                    <div class="company-meta">
                        <i class="bi bi-geo-alt me-1"></i>
                        {{ $company->city }}, {{ $company->state }}
                        <span class="mx-1">·</span>
                        <i class="bi bi-building me-1"></i>
                        {{ $company->industry }}
                    </div>

                    @if ($company->website)
                        <a class="company-website"
                           href="{{ $company->website }}"
                           target="_blank"
                           rel="noopener noreferrer">
                            <i class="bi bi-globe me-1"></i>
                            {{ $company->website }}
                            <i class="bi bi-box-arrow-up-right ms-1"></i>
                        </a>
                    @endif
                </div>

                <span class="verified-badge">
                    <i class="bi bi-shield-check"></i>
                    Company Profile
                </span>

            </div>

            <!-- Job form -->
            <form id="jobPostForm"
                  action="{{ route('recruiter.jobs.store') }}"
                  method="POST">

                @csrf

                <div class="section-heading">
                    <span class="section-heading-icon">
                        <i class="bi bi-card-text"></i>
                    </span>
                    <div>
                        <h3>Job Information</h3>
                        <p>Provide the role, requirements and employment details.</p>
                    </div>
                </div>

                <div class="form-layout">

                    <!-- Job title -->
                    <div class="field">
                        <label for="job_title" class="form-label">
                            Job Title <span class="required">*</span>
                        </label>
                        <input
                            id="job_title"
                            type="text"
                            name="job_title"
                            class="form-control"
                            maxlength="150"
                            value="{{ old('job_title') }}"
                            placeholder="e.g. PHP Web Developer"
                            required
                        >
                    </div>

                    <!-- Location -->
                    <div class="field">
                        <label for="location" class="form-label">
                            Job Location <span class="required">*</span>
                        </label>
                        <input
                            id="location"
                            type="text"
                            name="location"
                            class="form-control"
                            maxlength="150"
                            value="{{ old('location', $company->city . ', ' . $company->state) }}"
                            placeholder="e.g. Ahmedabad, Gujarat"
                            required
                        >
                    </div>

                    <!-- Job type -->
                    <div class="field">
                        <label for="job_type" class="form-label">
                            Job Type <span class="required">*</span>
                        </label>
                        <select id="job_type" name="job_type" class="form-select" required>
                            <option value="">Select job type</option>
                            @foreach (['Full-time', 'Part-time', 'Contract', 'Internship'] as $type)
                                <option value="{{ $type }}" @selected(old('job_type') === $type)>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Work mode -->
                    <div class="field">
                        <label for="work_mode" class="form-label">
                            Work Mode <span class="required">*</span>
                        </label>
                        <select id="work_mode" name="work_mode" class="form-select" required>
                            <option value="">Select work mode</option>
                            @foreach (['On-site', 'Remote', 'Hybrid'] as $mode)
                                <option value="{{ $mode }}" @selected(old('work_mode') === $mode)>
                                    {{ $mode }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Qualification -->
                    <div class="field">
                        <label for="qualification" class="form-label">
                            Required Qualification <span class="required">*</span>
                        </label>
                        <input
                            id="qualification"
                            type="text"
                            name="qualification"
                            class="form-control"
                            maxlength="255"
                            value="{{ old('qualification') }}"
                            placeholder="e.g. BCA, MCA, B.Tech"
                            required
                        >
                    </div>

                    <!-- Vacancies -->
                    <div class="field">
                        <label for="total_vacancies" class="form-label">
                            Total Vacancies <span class="required">*</span>
                        </label>
                        <input
                            id="total_vacancies"
                            type="number"
                            name="total_vacancies"
                            class="form-control"
                            min="1"
                            max="100000"
                            value="{{ old('total_vacancies', 1) }}"
                            required
                        >
                    </div>

                    <!-- Minimum experience -->
                    <div class="field">
                        <label for="experience_min" class="form-label">
                            Minimum Experience (Years) <span class="required">*</span>
                        </label>
                        <input
                            id="experience_min"
                            type="number"
                            name="experience_min"
                            class="form-control"
                            min="0"
                            max="50"
                            value="{{ old('experience_min', 0) }}"
                            required
                        >
                    </div>

                    <!-- Maximum experience -->
                    <div class="field">
                        <label for="experience_max" class="form-label">
                            Maximum Experience (Years) <span class="required">*</span>
                        </label>
                        <input
                            id="experience_max"
                            type="number"
                            name="experience_max"
                            class="form-control"
                            min="0"
                            max="50"
                            value="{{ old('experience_max', 2) }}"
                            required
                        >
                    </div>

                    <!-- Minimum salary -->
                    <div class="field">
                        <label for="salary_min_lpa" class="form-label">
                            Minimum Salary (LPA) <span class="required">*</span>
                        </label>
                        <div class="salary-prefix">
                            <span>₹ LPA</span>
                            <input
                                id="salary_min_lpa"
                                type="number"
                                name="salary_min_lpa"
                                class="form-control"
                                min="0"
                                max="1000"
                                step="0.01"
                                value="{{ old('salary_min_lpa') }}"
                                placeholder="e.g. 2.50"
                                required
                            >
                        </div>
                    </div>

                    <!-- Maximum salary -->
                    <div class="field">
                        <label for="salary_max_lpa" class="form-label">
                            Maximum Salary (LPA) <span class="required">*</span>
                        </label>
                        <div class="salary-prefix">
                            <span>₹ LPA</span>
                            <input
                                id="salary_max_lpa"
                                type="number"
                                name="salary_max_lpa"
                                class="form-control"
                                min="0"
                                max="1000"
                                step="0.01"
                                value="{{ old('salary_max_lpa') }}"
                                placeholder="e.g. 4.50"
                                required
                            >
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="field span-2">
                        <label for="skills" class="form-label">
                            Required Skills <span class="required">*</span>
                        </label>
                        <input
                            id="skills"
                            type="text"
                            name="skills"
                            class="form-control"
                            maxlength="2000"
                            value="{{ old('skills') }}"
                            placeholder="PHP, Laravel, MongoDB, HTML, CSS"
                            required
                        >
                        <div class="form-text">
                            <i class="bi bi-lightbulb me-1"></i>
                            Separate each skill with a comma.
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="field span-2">
                        <label for="description" class="form-label">
                            Job Description and Responsibilities
                            <span class="required">*</span>
                        </label>
                        <textarea
                            id="description"
                            name="description"
                            class="form-control"
                            rows="4"
                            maxlength="10000"
                            placeholder="Describe the role, responsibilities, requirements and benefits..."
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                </div>

                <!-- Actions -->
                <div class="form-footer">
                    <div class="required-note">
                        <span class="required">*</span> Required fields
                    </div>

                    <div class="footer-actions">
                        <a href="{{ route('recruiter.dashboard') }}"
                           class="btn btn-cancel">
                            Cancel
                        </a>

                        <button id="submitJobButton"
                                type="submit"
                                class="btn btn-green btn-submit">
                            <i class="bi bi-send me-1"></i>
                            Post Job
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</main>

<!-- Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert messages from Laravel
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Job Posted Successfully!',
                text: @json(session('success')),
                confirmButtonText: 'Continue',
                confirmButtonColor: '#21604A',
                allowOutsideClick: false
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Unable to Post Job',
                text: @json(session('error')),
                confirmButtonText: 'OK',
                confirmButtonColor: '#21604A'
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Please Check Your Form',
                html: @json(implode("\n", $errors->all()))
                    .split('\n')
                    .map(function (message) {
                        return '<div style="text-align:left;margin:7px 0;">• '
                            + escapeHtml(message) + '</div>';
                    })
                    .join(''),
                confirmButtonText: 'Review Form',
                confirmButtonColor: '#21604A'
            });
        @endif
    });

    function escapeHtml(value) {
        const element = document.createElement('div');
        element.textContent = value;
        return element.innerHTML;
    }

    // Validate related ranges before submission
    const jobForm = document.getElementById('jobPostForm');
    const submitButton = document.getElementById('submitJobButton');

    let submissionConfirmed = false;
    let submissionInProgress = false;

    jobForm.addEventListener('submit', async function (event) {
        if (submissionInProgress) {
            event.preventDefault();
            return;
        }

        // This is the second submit event after the user confirms.
        if (submissionConfirmed) {
            submissionConfirmed = false;
            submissionInProgress = true;

            submitButton.disabled = true;
            submitButton.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2" aria-hidden="true"></span>Posting Job...';

            return;
        }

        event.preventDefault();

        const minExperience = Number(
            document.getElementById('experience_min').value
        );

        const maxExperience = Number(
            document.getElementById('experience_max').value
        );

        const minSalary = Number(
            document.getElementById('salary_min_lpa').value
        );

        const maxSalary = Number(
            document.getElementById('salary_max_lpa').value
        );

        if (maxExperience < minExperience) {
            Swal.fire({
                icon: 'warning',
                title: 'Check Experience Range',
                text: 'Maximum experience must be greater than or equal to minimum experience.',
                confirmButtonColor: '#21604A'
            });
            return;
        }

        if (maxSalary < minSalary) {
            Swal.fire({
                icon: 'warning',
                title: 'Check Salary Range',
                text: 'Maximum salary must be greater than or equal to minimum salary.',
                confirmButtonColor: '#21604A'
            });
            return;
        }

        const result = await Swal.fire({
            icon: 'question',
            title: 'Publish This Job?',
            text: 'Please make sure the job details are correct before publishing.',
            showCancelButton: true,
            confirmButtonText: '<i class="bi bi-send me-1"></i> Yes, Post Job',
            cancelButtonText: 'Review Details',
            confirmButtonColor: '#21604A',
            cancelButtonColor: '#758078',
            reverseButtons: true,
            focusCancel: true
        });

        if (result.isConfirmed) {
            submissionConfirmed = true;
            jobForm.requestSubmit();
        }
    });
</script>

</body>
</html>