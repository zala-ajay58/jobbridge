<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        :root {
            --primary: #21604A;
            --primary-dark: #144432;
            --light-green: #edf5f0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7f6;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid #e8ece9;
        }

        .brand {
            color: var(--primary);
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .login-wrapper {
            min-height: calc(100vh - 75px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px 15px;
        }

        .login-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            max-width: 920px;
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 45px rgba(20, 68, 50, 0.09);
        }

        .login-info {
            background: var(--primary);
            color: #fff;
            padding: 55px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-info h1 {
            font-size: 35px;
            font-weight: 800;
            line-height: 1.25;
        }

        .login-info p {
            color: #e1eee6;
            line-height: 1.8;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 22px;
        }

        .feature i {
            font-size: 22px;
        }

        .login-form {
            padding: 50px 40px;
        }

        .login-form h2 {
            color: #202923;
            font-size: 29px;
            font-weight: 750;
        }

        .subtitle {
            color: #747c76;
            margin-bottom: 28px;
        }

        .form-label {
            font-weight: 600;
            color: #303832;
        }

        .form-control {
            min-height: 48px;
            border-radius: 9px;
            border-color: #dce3de;
            padding: 12px 14px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(33, 96, 74, 0.12);
        }

        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            min-height: 49px;
            border-radius: 9px;
            font-weight: 700;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            color: white;
        }

        .signup-link {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .signup-link:hover {
            text-decoration: underline;
        }

        .password-wrap {
            position: relative;
        }

        .password-wrap .form-control {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #66716a;
        }

        @media (max-width: 767px) {
            .login-card {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .login-info {
                padding: 30px 25px;
            }

            .login-info h1 {
                font-size: 27px;
            }

            .feature {
                margin-top: 14px;
            }

            .login-form {
                padding: 32px 25px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar py-3">
        <div class="container">
            <a class="brand" href="{{ route('home') }}">
                <i class="bi bi-briefcase-fill"></i> JobBridge
            </a>

            <div>
                <span class="text-secondary d-none d-sm-inline me-2">
                    New to JobBridge?
                </span>
                <a href="{{ route('register') }}"
                   class="btn btn-outline-success btn-sm">
                    Create account
                </a>
            </div>
        </div>
    </nav>

    <main class="login-wrapper">
        <div class="login-card">

            <section class="login-info">
                <div class="mb-3">
                    <i class="bi bi-briefcase-fill fs-1"></i>
                </div>

                <h1>Welcome back to your next opportunity.</h1>

                <p class="mt-3">
                    Sign in to discover jobs, connect with employers,
                    and take the next step in your career.
                </p>

                <div class="feature">
                    <i class="bi bi-search"></i>
                    <span>Discover jobs that match your skills</span>
                </div>

                <div class="feature">
                    <i class="bi bi-person-check"></i>
                    <span>Manage your career opportunities</span>
                </div>

                <div class="feature">
                    <i class="bi bi-shield-check"></i>
                    <span>Your career journey, all in one place</span>
                </div>
            </section>

            <section class="login-form">
                <h2>Sign in</h2>
                <p class="subtitle">Enter your account details to continue.</p>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

               @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed!',
                text: @json($errors->first()),
                confirmButtonText: 'Try Again',
                confirmButtonColor: '#21604A'
            });
        });
    </script>
@endif

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="you@example.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>

                        <div class="password-wrap">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >

                            <button type="button"
                                    class="toggle-password"
                                    id="togglePassword"
                                    aria-label="Show password">
                                <i class="bi bi-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        Sign in <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </form>
                <div class="text-end mb-3">
    
</div>
<a href="{{ route('password.reset.verify') }}"
       class="text-decoration-none"
       style="color:#21604A;">
        Forgot Password?
    </a>

                <p class="text-center mt-4 mb-0 text-secondary">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="signup-link">
                        Register now
                    </a>
                </p>
                
            </section>
        </div>
    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const isPassword = password.type === 'password';

            password.type = isPassword ? 'text' : 'password';
            eyeIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';

            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Hide password' : 'Show password'
            );
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('password_reset_success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Password Changed!',
        text: @json(session('password_reset_success')),
        confirmButtonText: 'Go to Login',
        confirmButtonColor: '#21604A',
        allowOutsideClick: false
    });
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Login Failed!',
        text: 'Invalid email or password. Please try again.',
        confirmButtonText: 'Try Again',
        confirmButtonColor: '#21604A'
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: @json(session('success')),
        confirmButtonColor: '#21604A'
    });
</script>
@endif

</body>
</html>