<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #edf5f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .reset-card {
            width: 100%;
            max-width: 440px;
            background: white;
            padding: 32px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(20, 68, 50, .10);
        }

        .brand { color: #21604A; font-weight: 800; }
        .btn-green { background: #21604A; color: white; }
        .btn-green:hover { background: #144432; color: white; }
        .form-control:focus {
            border-color: #21604A;
            box-shadow: 0 0 0 .2rem rgba(33, 96, 74, .12);
        }
    </style>
</head>
<body>

<div class="reset-card">
    <div class="text-center mb-4">
        <h3 class="brand"><i class="bi bi-briefcase-fill"></i> JobBridge</h3>
        <h1 class="h4 fw-bold mt-4">Reset your password</h1>
        <p class="text-secondary small">
            Verify your registered email and date of birth to continue.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger py-2 small">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.reset.verify.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">
                Registered email
            </label>
            <input type="email" id="email" name="email"
                   class="form-control" value="{{ old('email') }}"
                   placeholder="Enter your email" required autocomplete="email">
        </div>

        <div class="mb-4">
            <label for="dob" class="form-label fw-semibold">
                Date of birth
            </label>
            <input type="date" id="dob" name="dob"
                   class="form-control" value="{{ old('dob') }}" required>
        </div>

        <button type="submit" class="btn btn-green w-100 py-2">
            Verify and Continue <i class="bi bi-arrow-right ms-1"></i>
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-decoration-none"
           style="color:#21604A">
            <i class="bi bi-arrow-left me-1"></i> Back to Login
        </a>
    </div>
</div>

</body>
</html>
