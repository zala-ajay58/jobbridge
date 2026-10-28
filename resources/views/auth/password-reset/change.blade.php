
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose New Password | JobBridge</title>

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
        <h1 class="h4 fw-bold mt-4">Create a new password</h1>
        <p class="text-secondary small">
            Choose a password with at least 8 characters.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger py-2 small">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.reset.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">
                New password
            </label>
            <input type="password" id="password" name="password"
                   class="form-control" placeholder="Enter new password"
                   minlength="8" required autocomplete="new-password">
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">
                Confirm new password
            </label>
            <input type="password" id="password_confirmation"
                   name="password_confirmation" class="form-control"
                   placeholder="Re-enter new password"
                   minlength="8" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-green w-100 py-2">
            <i class="bi bi-shield-check me-1"></i> Change Password
        </button>
    </form>
</div>

</body>
</html>
