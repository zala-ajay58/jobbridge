
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apply for {{ $job->job_title }} | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --dark-green: #144432;
            --light-green: #edf5f0;
            --border: #dce7e0;
        }

        body {
            background: #f5f8f6;
            font-family: Arial, sans-serif;
            color: #25352d;
        }

        .navbar, .form-card {
            background: white;
        }

        .navbar {
            border-bottom: 1px solid var(--border);
        }

        .brand {
            color: var(--green);
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .form-card {
            max-width: 750px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(20, 68, 50, .06);
        }

        .heading {
            color: var(--dark-green);
            font-weight: 800;
        }

        .btn-green {
            background: var(--green);
            border-color: var(--green);
            color: white;
        }

        .btn-green:hover {
            background: var(--dark-green);
            border-color: var(--dark-green);
            color: white;
        }

        .form-control:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 .2rem rgba(33, 96, 74, .12);
        }

        .job-summary {
            background: var(--light-green);
            border-radius: 10px;
            padding: 16px;
        }

        .required {
            color: #dc3545;
        }

        @media (max-width: 576px) {
            .form-card {
                margin: 20px 12px;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container py-3">
        <a href="{{ route('candidate.jobs.index') }}" class="brand">
            Job<span style="color: var(--dark-green)">Bridge</span>
        </a>

        <a href="{{ route('candidate.jobs.show', ['id' => (string) $job->_id]) }}"
           class="btn btn-outline-success btn-sm">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Job
        </a>
    </div>
</nav>

<div class="container pb-4">

    <div class="form-card">

        <div class="text-center mb-4">
            <i class="bi bi-file-earmark-person"
               style="font-size: 48px; color: var(--green);"></i>

            <h1 class="heading h3 mt-2">Apply for This Job</h1>

            <p class="text-secondary mb-0">
                Complete the form below to submit your application.
            </p>
        </div>

        <div class="job-summary mb-4">
            <div class="fw-bold fs-5">
                {{ $job->job_title }}
            </div>

            <div class="text-secondary mt-1">
                <i class="bi bi-building me-1"></i>
                {{ $job->company_name ?? 'Company not specified' }}
            </div>

            <div class="text-secondary small mt-1">
                <i class="bi bi-geo-alt me-1"></i>
                {{ $job->location ?? 'Location not specified' }}
            </div>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('candidate.jobs.apply.store', ['id' => (string) $job->_id]) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="full_name" class="form-label fw-semibold">
                    Full Name <span class="required">*</span>
                </label>

                <input type="text"
                       class="form-control @error('full_name') is-invalid @enderror"
                       id="full_name"
                       name="full_name"
                       value="{{ old('full_name') }}"
                       placeholder="Enter your full name"
                       maxlength="150"
                       autocomplete="name"
                       required>

                @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact_number" class="form-label fw-semibold">
                    Contact Number <span class="required">*</span>
                </label>

                <input type="tel"
                       class="form-control @error('contact_number') is-invalid @enderror"
                       id="contact_number"
                       name="contact_number"
                       value="{{ old('contact_number') }}"
                       placeholder="Enter your contact number"
                       maxlength="20"
                       autocomplete="tel"
                       required>

                @error('contact_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
    <label for="email" class="form-label fw-semibold">
        Email Address <span class="required">*</span>
    </label>

    <input type="email"
           class="form-control @error('email') is-invalid @enderror"
           id="email"
           name="email"
           value="{{ old('email', auth()->user()->email ?? '') }}"
           placeholder="Enter an email address you can access"
           maxlength="254"
           autocomplete="email"
           required>

    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="form-text">
        Use an email address where you can receive application updates.
    </div>
</div>

            <div class="mb-4">
                <label for="resume" class="form-label fw-semibold">
                    Upload CV / Resume <span class="required">*</span>
                </label>

                <input type="file"
                       class="form-control @error('resume') is-invalid @enderror"
                       id="resume"
                       name="resume"
                       accept=".pdf,.doc,.docx"
                       required>

                <div class="form-text">
                    Accepted formats: PDF, DOC, DOCX. Maximum size: 5 MB.
                </div>

                @error('resume')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-green btn-lg">
                    <i class="bi bi-send me-2"></i>
                    Submit Application
                </button>

                <a href="{{ route('candidate.jobs.show', ['id' => (string) $job->_id]) }}"
                   class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>
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
        title: 'Oops!',
        text: @json(session('error')),
        icon: 'error',
        confirmButtonText: 'OK',
        confirmButtonColor: '#21604A'
    });
</script>
@endif
</body>
</html>
