<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#21604A">
    <title>Create Account | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #21604A;
            --primary-dark: #144432;
            --primary-light: #edf5f0;
            --text: #202b26;
            --muted: #718078;
            --border: #dce7e0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background: #f5f8f6;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid #e6ede8;
        }

        .navbar-brand {
            color: var(--primary) !important;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand-icon {
            display: inline-flex;
            width: 36px;
            height: 36px;
            align-items: center;
            justify-content: center;
            margin-right: 7px;
            color: white;
            background: var(--primary);
            border-radius: 11px;
        }

        .page-wrapper {
            max-width: 1120px;
            margin: 32px auto;
        }

        .register-shell {
            display: grid;
            grid-template-columns: 0.78fr 1.45fr;
            overflow: hidden;
            background: white;
            border: 1px solid #e5ece7;
            border-radius: 22px;
            box-shadow: 0 18px 55px rgba(27, 65, 46, .08);
        }

        .welcome-panel {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 38px 30px;
            color: white;
            background: linear-gradient(145deg, #21604A, #144432);
        }

        .welcome-panel::after {
            position: absolute;
            right: -75px;
            bottom: 80px;
            width: 220px;
            height: 220px;
            content: "";
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            box-shadow: 0 0 0 35px rgba(255,255,255,.035),
                        0 0 0 70px rgba(255,255,255,.025);
            pointer-events: none;
        }

        .welcome-content,
        .welcome-footer {
            position: relative;
            z-index: 1;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            font-size: .78rem;
            font-weight: 600;
            color: #e1f3e8;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 30px;
        }

        .welcome-panel h1 {
            margin: 28px 0 14px;
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .welcome-panel p {
            color: #d5e6dc;
            line-height: 1.75;
            font-size: .95rem;
        }

        .benefit {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-top: 23px;
        }

        .benefit-icon {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            color: #e4f4e9;
            background: rgba(255,255,255,.12);
            border-radius: 11px;
        }

        .benefit strong {
            display: block;
            margin-bottom: 3px;
            font-size: .9rem;
        }

        .benefit small {
            color: #d5e6dc;
            line-height: 1.5;
        }

        .welcome-footer {
            margin-top: 45px;
            color: #c7ddd0;
            font-size: .78rem;
        }

        .form-panel {
            min-width: 0;
            padding: 36px 40px;
        }

        .form-heading h2 {
            margin-bottom: 7px;
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -.7px;
        }

        .form-heading p {
            margin-bottom: 27px;
            color: var(--muted);
            font-size: .9rem;
        }

        .section-heading {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 25px 0 16px;
            color: var(--primary);
            font-size: .91rem;
            font-weight: 800;
        }

        .section-heading:first-of-type {
            margin-top: 0;
        }

        .section-heading i {
            font-size: 1.05rem;
        }

        .form-label {
            margin-bottom: 7px;
            color: #34483d;
            font-size: .83rem;
            font-weight: 700;
        }

        .required::after {
            content: " *";
            color: #dc3545;
        }

        .form-control,
        .form-select {
            min-height: 45px;
            padding: 10px 12px;
            color: var(--text);
            background-color: #fff;
            border: 1px solid var(--border);
            border-radius: 9px;
            font-size: .88rem;
            transition: border-color .2s, box-shadow .2s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(33,96,74,.10);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            font-size: .77rem;
        }

        .form-text {
            color: var(--muted);
            font-size: .76rem;
            line-height: 1.5;
        }

        .password-wrap {
            position: relative;
        }

        .password-wrap .form-control {
            padding-right: 44px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            padding: 0;
            color: #728078;
            background: none;
            border: 0;
            transform: translateY(-50%);
        }

        .role-option {
            display: flex;
            flex: 1;
            align-items: center;
            gap: 10px;
            min-height: 58px;
            padding: 12px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 10px;
            cursor: pointer;
            transition: .2s ease;
        }

        .role-option:has(input:checked) {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        .role-option input {
            width: 17px;
            height: 17px;
            margin: 0;
            accent-color: var(--primary);
        }

        .role-option strong {
            display: block;
            font-size: .85rem;
        }

        .role-option small {
            color: var(--muted);
            font-size: .73rem;
        }

        .photo-upload {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 14px;
            background: #f9fbf9;
            border: 1px dashed #bdcec2;
            border-radius: 12px;
        }

        .photo-preview {
            width: 76px;
            height: 76px;
            flex-shrink: 0;
            object-fit: cover;
            background: var(--primary-light);
            border: 3px solid white;
            border-radius: 50%;
            box-shadow: 0 0 0 1px var(--border);
        }

        .btn-register {
            min-height: 49px;
            color: white;
            background: var(--primary);
            border: 0;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 700;
            transition: .2s ease;
        }

        .btn-register:hover {
            color: white;
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 7px 18px rgba(33,96,74,.18);
        }

        .login-link {
            color: var(--primary);
            font-weight: 700;
        }

        .login-link:hover {
            color: var(--primary-dark);
            text-decoration: underline !important;
        }

        @media (max-width: 850px) {
            .page-wrapper {
                max-width: 720px;
                margin: 22px auto;
            }

            .register-shell {
                grid-template-columns: 1fr;
            }

            .welcome-panel {
                padding: 26px;
            }

            .welcome-panel h1 {
                margin-top: 18px;
                font-size: 1.8rem;
            }

            .welcome-panel .benefit-list,
            .welcome-footer {
                display: none;
            }

            .form-panel {
                padding: 30px;
            }
        }

        @media (max-width: 576px) {
            .page-wrapper {
                margin: 14px auto;
            }

            .register-shell {
                border-radius: 16px;
            }

            .welcome-panel {
                padding: 22px;
            }

            .form-panel {
                padding: 24px 18px;
            }

            .form-heading h2 {
                font-size: 1.5rem;
            }

            .photo-upload {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
<nav class="navbar py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <span class="brand-icon"><i class="bi bi-briefcase-fill"></i></span>
            JobBridge
        </a>

        <span class="small text-secondary d-none d-sm-inline">
            Find your next opportunity
        </span>
    </div>
</nav>

<main class="container px-3">
    <div class="page-wrapper">
        <div class="register-shell">

            <aside class="welcome-panel">
                <div class="welcome-content">
                    <span class="welcome-badge">
                        <i class="bi bi-stars"></i>
                        Your next chapter starts here
                    </span>

                    <h1>Build your future with JobBridge.</h1>

                    <p>
                        Create your account to explore opportunities,
                        connect with employers, and take the next step
                        in your career.
                    </p>

                    <div class="benefit-list">
                        <div class="benefit">
                            <span class="benefit-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <div>
                                <strong>Discover opportunities</strong>
                                <small>Explore jobs that match your skills and goals.</small>
                            </div>
                        </div>

                        <div class="benefit">
                            <span class="benefit-icon">
                                <i class="bi bi-person-check"></i>
                            </span>
                            <div>
                                <strong>Create your profile</strong>
                                <small>Present your details to potential employers.</small>
                            </div>
                        </div>

                        <div class="benefit">
                            <span class="benefit-icon">
                                <i class="bi bi-building-check"></i>
                            </span>
                            <div>
                                <strong>Connect with employers</strong>
                                <small>Join as a candidate or a recruiter.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="welcome-footer">
                    <i class="bi bi-shield-check me-1"></i>
                    A better way to connect talent with opportunity.
                </div>
            </aside>

            <section class="form-panel">
                <div class="form-heading">
                    <h2>Create your account</h2>
                    <p>Fill in your details to get started with JobBridge.</p>
                </div>

                <form id="registerForm"
                      action="{{ route('register.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      novalidate>
                    @csrf

                    <div class="section-heading">
                        <i class="bi bi-person-vcard"></i>
                        Personal information
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <label for="first_name" class="form-label required">First name</label>
                            <input type="text" id="first_name" name="first_name"
                                   class="form-control @error('first_name') is-invalid @enderror"
                                   value="{{ old('first_name') }}"
                                   minlength="2" maxlength="50"
                                   pattern="[\p{L}\s'-]+"
                                   autocomplete="given-name" required>
                            <div class="invalid-feedback">Enter a valid first name.</div>
                            @error('first_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="middle_name" class="form-label">Middle name</label>
                            <input type="text" id="middle_name" name="middle_name"
                                   class="form-control @error('middle_name') is-invalid @enderror"
                                   value="{{ old('middle_name') }}"
                                   maxlength="50" autocomplete="additional-name">
                            @error('middle_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="last_name" class="form-label required">Last name</label>
                            <input type="text" id="last_name" name="last_name"
                                   class="form-control @error('last_name') is-invalid @enderror"
                                   value="{{ old('last_name') }}"
                                   minlength="2" maxlength="50"
                                   autocomplete="family-name" required>
                            <div class="invalid-feedback">Enter your last name.</div>
                            @error('last_name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="dob" class="form-label required">Date of birth</label>
                            <input type="date" id="dob" name="dob"
                                   class="form-control @error('dob') is-invalid @enderror"
                                   value="{{ old('dob') }}"
                                   max="{{ now()->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">Select a valid date of birth.</div>
                            @error('dob')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="phone" class="form-label required">Phone number</label>
                            <input type="tel" id="phone" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}"
                                   placeholder="9876543210"
                                   pattern="\+?[0-9]{10,15}"
                                   minlength="10" maxlength="16"
                                   autocomplete="tel" required>
                            <div class="invalid-feedback">Enter 10–15 digits, optionally starting with +.</div>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label required">Email address</label>
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   maxlength="255" autocomplete="email" required>
                            <div class="invalid-feedback">Enter a valid email address.</div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="gender" class="form-label required">Gender</label>
                            <select name="gender" id="gender"
                                    class="form-select @error('gender') is-invalid @enderror"
                                    required>
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                                <option value="prefer_not_to_say" {{ old('gender') === 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="section-heading">
                        <i class="bi bi-shield-lock"></i>
                        Account security
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="password" class="form-label required">Password</label>
                            <div class="password-wrap">
                                <input type="password" id="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       minlength="8" autocomplete="new-password"
                                       aria-describedby="passwordHelp" required>
                                <button type="button" class="toggle-password"
                                        data-target="password" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div id="passwordHelp" class="form-text">
                                At least 8 characters, with a letter and a number.
                            </div>
                            <div class="invalid-feedback">Use at least 8 characters, including a letter and a number.</div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="password_confirmation" class="form-label required">Confirm password</label>
                            <div class="password-wrap">
                                <input type="password" id="password_confirmation"
                                       name="password_confirmation"
                                       class="form-control"
                                       minlength="8" autocomplete="new-password" required>
                                <button type="button" class="toggle-password"
                                        data-target="password_confirmation" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback">Passwords must match.</div>
                        </div>
                    </div>

                    <div class="section-heading">
                        <i class="bi bi-person-workspace"></i>
                        Account type
                    </div>

                    <label class="form-label required">Register as</label>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <label class="role-option">
                            <input type="radio" name="role" id="candidate"
                                   value="candidate"
                                   {{ old('role') === 'candidate' ? 'checked' : '' }} required>
                            <span>
                                <strong>Candidate</strong>
                                <small>Find jobs and apply</small>
                            </span>
                        </label>

                        <label class="role-option">
                            <input type="radio" name="role" id="recruiter"
                                   value="recruiter"
                                   {{ old('role') === 'recruiter' ? 'checked' : '' }} required>
                            <span>
                                <strong>Recruiter</strong>
                                <small>Post jobs and find talent</small>
                            </span>
                        </label>
                    </div>
                    @error('role')
                        <div class="text-danger small mt-2">{{ $message }}</div>
                    @enderror

                    <div class="section-heading">
                        <i class="bi bi-camera"></i>
                        Profile photo
                    </div>

                    <label for="profile_photo" class="form-label required">Upload a profile photo</label>
                    <div class="photo-upload">
                        <img id="photoPreview"
                             class="photo-preview"
                             src="https://placehold.co/100x100/eaf3ed/21604A?text=Photo"
                             alt="Profile photo preview">

                        <div class="flex-grow-1">
                            <input type="file" id="profile_photo" name="profile_photo"
                                   class="form-control @error('profile_photo') is-invalid @enderror"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   aria-describedby="photoHelp" required>
                            <div id="photoHelp" class="form-text mt-2">
                                JPG, PNG or WebP · Maximum 2 MB
                            </div>
                            <div class="invalid-feedback">Choose an image no larger than 2 MB.</div>
                            @error('profile_photo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-register w-100 mt-4">
                        <i class="bi bi-person-plus me-2"></i>
                        Create account
                    </button>

                    <p class="text-center text-secondary small mt-4 mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}" class="login-link text-decoration-none">Log in</a>
                    </p>
                </form>
            </section>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const form = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmation = document.getElementById('password_confirmation');
    const photoInput = document.getElementById('profile_photo');
    const photoPreview = document.getElementById('photoPreview');

    const defaultPhoto = 'https://placehold.co/100x100/eaf3ed/21604A?text=Photo';
    const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;
    const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    const maxPhotoSize = 2 * 1024 * 1024;
    let previewUrl = null;

    function validatePasswordStrength() {
        password.setCustomValidity(
            passwordPattern.test(password.value)
                ? ''
                : 'Use at least 8 characters, including a letter and a number.'
        );
    }

    function validatePasswordMatch() {
        confirmation.setCustomValidity(
            confirmation.value === password.value
                ? ''
                : 'Passwords do not match.'
        );
    }

    password.addEventListener('input', () => {
        validatePasswordStrength();
        validatePasswordMatch();
    });

    confirmation.addEventListener('input', validatePasswordMatch);

    document.querySelectorAll('.toggle-password').forEach(button => {
        button.addEventListener('click', () => {
            const input = document.getElementById(button.dataset.target);
            const icon = button.querySelector('i');
            const show = input.type === 'password';

            input.type = show ? 'text' : 'password';
            icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
            button.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        });
    });

    photoInput.addEventListener('change', function () {
        const file = this.files[0];
        this.setCustomValidity('');

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (!file) {
            photoPreview.src = defaultPhoto;
            return;
        }

        if (!allowedTypes.includes(file.type) || file.size > maxPhotoSize) {
            this.setCustomValidity('Select a JPG, PNG or WebP image no larger than 2 MB.');
            photoPreview.src = defaultPhoto;
            this.reportValidity();
            return;
        }

        previewUrl = URL.createObjectURL(file);
        photoPreview.src = previewUrl;
    });

    document.getElementById('dob').addEventListener('input', function () {
        this.setCustomValidity('');
    });

    form.addEventListener('submit', function (event) {
        validatePasswordStrength();
        validatePasswordMatch();

        const dob = document.getElementById('dob');
        const today = new Date();
        const localToday = [
            today.getFullYear(),
            String(today.getMonth() + 1).padStart(2, '0'),
            String(today.getDate()).padStart(2, '0')
        ].join('-');

        dob.setCustomValidity(
            dob.value && dob.value > localToday
                ? 'Date of birth cannot be in the future.'
                : ''
        );

        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Account created!',
            text: @json(session('success')),
            confirmButtonColor: '#21604A'
        });
    @endif

    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Please check your details',
            text: 'Some information is missing or invalid. Review the highlighted fields and try again.',
            confirmButtonText: 'Review form',
            confirmButtonColor: '#21604A'
        });
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Registration successful
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Registration Successful!',
            text: @json(session('success')),
            confirmButtonText: 'Continue',
            confirmButtonColor: '#21604A',
            allowOutsideClick: false
        }).then(() => {
            // Redirect to login after successful registration
            window.location.href = @json(route('login'));
        });
    @endif

    // Laravel validation errors
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Registration Failed!',
            text: 'Please check your details and correct the highlighted fields.',
            confirmButtonText: 'Try Again',
            confirmButtonColor: '#21604A'
        });
    @endif

    // Optional general error message
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong!',
            text: @json(session('error')),
            confirmButtonColor: '#21604A'
        });
    @endif
</script>
</body>
</html>
