
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f5f7f6;
            font-family: Arial, sans-serif;
        }

        .brand {
            color: #21604A;
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .edit-card {
            max-width: 760px;
            margin: 35px auto;
            background: #fff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .05);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            min-height: 45px;
        }

        .btn-green {
            background: #21604A;
            color: white;
        }

        .btn-green:hover {
            background: #144432;
            color: white;
        }

        .current-photo {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            object-fit: cover;
            background: #edf5f0;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-white shadow-sm py-3">
        <div class="container">
            <a href="{{ route('home') }}" class="brand">JobBridge</a>
            <a href="{{ route('profile.show') }}"
               class="btn btn-outline-success btn-sm">
                Back to Profile
            </a>
        </div>
    </nav>

    <main class="container">
        <div class="edit-card">
            <h1 class="h3 fw-bold mb-2">Edit Profile</h1>
            <p class="text-secondary mb-4">
                Keep your personal information up to date.
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label d-block">Profile Photo</label>

                    @if ($user->profile_photo)
                        <img
                            src="{{ asset('storage/' . $user->profile_photo) }}"
                            alt="Current profile photo"
                            class="current-photo mb-3"
                        >
                    @else
                        <div class="current-photo d-flex align-items-center
                                    justify-content-center mb-3">
                            <span class="fs-1 text-success">👤</span>
                        </div>
                    @endif

                    <input type="file"
                           name="profile_photo"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-secondary">
                        JPG, PNG, or WebP; maximum 2 MB.
                    </small>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="first_name" class="form-label">
                            First Name *
                        </label>
                        <input id="first_name"
                               name="first_name"
                               type="text"
                               class="form-control"
                               value="{{ old('first_name', $user->first_name) }}"
                               required>
                    </div>

                    <div class="col-md-4">
                        <label for="middle_name" class="form-label">
                            Middle Name
                        </label>
                        <input id="middle_name"
                               name="middle_name"
                               type="text"
                               class="form-control"
                               value="{{ old('middle_name', $user->middle_name) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label">
                            Last Name *
                        </label>
                        <input id="last_name"
                               name="last_name"
                               type="text"
                               class="form-control"
                               value="{{ old('last_name', $user->last_name) }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>
                        <input id="email"
                               type="email"
                               class="form-control"
                               value="{{ $user->email }}"
                               readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number *
                        </label>
                        <input id="phone"
                               name="phone"
                               type="tel"
                               class="form-control"
                               value="{{ old('phone', $user->phone) }}"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="dob" class="form-label">
                            Date of Birth
                        </label>
                        <input id="dob"
                               name="dob"
                               type="date"
                               class="form-control"
                               value="{{ old('dob', $user->dob ? \Illuminate\Support\Carbon::parse($user->dob)->format('Y-m-d') : '') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Account Type</label>
                        <input type="text"
                               class="form-control"
                               value="{{ ucfirst($user->role ?? 'candidate') }}"
                               readonly>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row gap-2 mt-4">
                    <button type="submit" class="btn btn-green px-4">
                        Save Changes
                    </button>

                    <a href="{{ route('profile.show') }}"
                       class="btn btn-outline-secondary px-4">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
