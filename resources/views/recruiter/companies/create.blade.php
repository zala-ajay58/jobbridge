
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f7f6;
            font-family: Arial, sans-serif;
        }

        .company-card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
        }

        .company-header {
            background: #21604A;
            color: white;
            padding: 24px;
        }

        .form-label {
            font-weight: 600;
        }

        .btn-green {
            background: #21604A;
            color: white;
        }

        .btn-green:hover {
            background: #144432;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark" style="background:#21604A">
    <div class="container">
        <a href="{{ route('recruiter.dashboard') }}"
           class="navbar-brand fw-bold">
            <i class="bi bi-briefcase-fill me-2"></i>JobBridge
        </a>

        <a href="{{ route('recruiter.dashboard') }}"
           class="btn btn-outline-light btn-sm">
            <i class="bi bi-speedometer2 me-1"></i>
            Recruiter Dashboard
        </a>
    </div>
</nav>

<div class="container py-4 py-md-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card company-card shadow-sm">
                <div class="company-header">
                    <h3 class="mb-2">
                        <i class="bi bi-building me-2"></i>
                        {{ $company ? 'Edit Company Profile' : 'Register Your Company' }}
                    </h3>
                    <p class="mb-0">
                        Tell candidates about your company.
                    </p>
                </div>

                <div class="card-body p-3 p-md-4">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Please correct these errors:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('recruiter.company.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <h5 class="mb-3">Company Information</h5>

                        <div class="mb-3">
                            <label class="form-label">Company Logo</label>
                            <input type="file"
                                   name="company_logo"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp">

                            @if ($company && $company->company_logo)
                                <img
                                    src="{{ asset('storage/' . $company->company_logo) }}"
                                    alt="Company logo"
                                    class="mt-3 border rounded p-2"
                                    style="width:100px;height:100px;object-fit:contain">
                            @endif

                            <div class="form-text">
                                JPG, PNG or WEBP; maximum 2 MB.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Name *</label>
                            <input type="text"
                                   name="company_name"
                                   class="form-control"
                                   value="{{ old('company_name', $company?->company_name) }}"
                                   maxlength="150"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Company Description *</label>
                            <textarea name="company_description"
                                      class="form-control"
                                      rows="4"
                                      maxlength="5000"
                                      required>{{ old('company_description', $company?->company_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Industry *</label>
                            <select name="industry" class="form-select" required>
                                <option value="">Select industry</option>
                                @foreach ([
                                    'Information Technology',
                                    'Education',
                                    'Healthcare',
                                    'Finance',
                                    'Manufacturing',
                                    'Retail',
                                    'Marketing',
                                    'Construction',
                                    'Other'
                                ] as $industry)
                                    <option value="{{ $industry }}"
                                        @selected(old('industry', $company?->industry) === $industry)>
                                        {{ $industry }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Size</label>
                                <select name="company_size" class="form-select">
                                    <option value="">Select company size</option>
                                    @foreach ([
                                        '1-10 employees',
                                        '11-50 employees',
                                        '51-200 employees',
                                        '201-500 employees',
                                        '501-1000 employees',
                                        '1000+ employees'
                                    ] as $size)
                                        <option value="{{ $size }}"
                                            @selected(old('company_size', $company?->company_size) === $size)>
                                            {{ $size }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Founded Year</label>
                                <input type="number"
                                       name="founded_year"
                                       class="form-control"
                                       min="1800"
                                       max="{{ date('Y') }}"
                                       value="{{ old('founded_year', $company?->founded_year) }}">
                            </div>
                        </div>

                        <hr>
                        <h5 class="mb-3">Contact Information</h5>

                        <div class="mb-3">
                            <label class="form-label">Company Website</label>
                            <input type="url"
                                   name="website"
                                   class="form-control"
                                   value="{{ old('website', $company?->website) }}"
                                   placeholder="https://example.com">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Company Email</label>
                                <input type="email"
                                       name="company_email"
                                       class="form-control"
                                       value="{{ old('company_email', $company?->company_email) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="tel"
                                       name="phone"
                                       class="form-control"
                                       value="{{ old('phone', $company?->phone) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Office Address</label>
                            <input type="text"
                                   name="address"
                                   class="form-control"
                                   value="{{ old('address', $company?->address) }}">
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">City *</label>
                                <input type="text" name="city"
                                       class="form-control"
                                       value="{{ old('city', $company?->city) }}"
                                       required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">State *</label>
                                <input type="text" name="state"
                                       class="form-control"
                                       value="{{ old('state', $company?->state) }}"
                                       required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Country *</label>
                                <input type="text" name="country"
                                       class="form-control"
                                       value="{{ old('country', $company?->country ?? 'India') }}"
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">LinkedIn Company URL</label>
                            <input type="url"
                                   name="linkedin_url"
                                   class="form-control"
                                   value="{{ old('linkedin_url', $company?->linkedin_url) }}"
                                   placeholder="https://www.linkedin.com/company/...">
                        </div>

                        <button type="submit" class="btn btn-green">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ $company ? 'Update Company' : 'Register Company' }}
                        </button>

                        <a href="{{ route('recruiter.dashboard') }}"
                           class="btn btn-outline-secondary ms-2">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
