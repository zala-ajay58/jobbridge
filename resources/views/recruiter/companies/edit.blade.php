
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Company | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --green-dark: #144432;
            --green-light: #edf5f0;
            --border: #dce8df;
        }

        body {
            background: var(--green-light);
            color: var(--green-dark);
            font-family: system-ui, -apple-system, sans-serif;
        }

        .page-wrapper {
            max-width: 1000px;
            margin: 28px auto;
            padding: 0 14px;
        }

        .company-card {
            background: #fff;
            border: 1px solid rgba(20, 68, 50, .07);
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(20, 68, 50, .07);
            overflow: hidden;
        }

        .page-header {
            background: linear-gradient(120deg, #144432, #21604A);
            color: white;
            padding: 25px 30px;
        }

        .page-header p {
            color: rgba(255,255,255,.78);
        }

        .form-content {
            padding: 28px 30px;
        }

        .section-heading {
            color: var(--green-dark);
            font-size: 16px;
            font-weight: 750;
            margin-bottom: 17px;
        }

        .section-heading i {
            color: var(--green);
            margin-right: 7px;
        }

        .form-label {
            color: #294b3b;
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #d9e4dc;
            border-radius: 9px;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 .2rem rgba(33,96,74,.10);
        }

        textarea.form-control {
            resize: vertical;
        }

        .form-section {
            padding-bottom: 24px;
            margin-bottom: 24px;
            border-bottom: 1px solid #edf1ed;
        }

        .logo-panel {
            background: #f7faf8;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
        }

        .logo-preview {
            width: 120px;
            height: 120px;
            flex: 0 0 120px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .logo-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 8px;
        }

        .logo-placeholder {
            text-align: center;
            color: #7b9485;
            font-size: 12px;
        }

        .logo-placeholder i {
            display: block;
            font-size: 34px;
            margin-bottom: 5px;
        }

        .helper-text {
            color: #7b8980;
            font-size: 12px;
        }

        .btn-green {
            background: var(--green);
            color: white;
            border: 1px solid var(--green);
            border-radius: 9px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-green:hover {
            background: var(--green-dark);
            border-color: var(--green-dark);
            color: white;
        }

        .btn-outline-secondary {
            border-radius: 9px;
            padding: 10px 18px;
        }

        .required {
            color: #dc3545;
        }

        @media (max-width: 576px) {
            .page-wrapper {
                margin: 12px auto;
            }

            .page-header,
            .form-content {
                padding: 20px 16px;
            }

            .logo-preview {
                width: 95px;
                height: 95px;
                flex-basis: 95px;
            }

            .header-actions {
                margin-top: 15px;
            }
        }
    </style>
</head>

<body>

<div class="page-wrapper">
    <div class="company-card">

        {{-- Header --}}
        <div class="page-header">
            <div class="d-flex flex-column flex-sm-row
                        justify-content-between align-items-sm-center">
                <div>
                    <div class="small mb-2">
                        <i class="bi bi-building me-1"></i>
                        JOBBRIDGE RECRUITER PORTAL
                    </div>

                    <h1 class="h3 fw-bold mb-1">Edit Company Profile</h1>

                    <p class="small mb-0">
                        Keep your company information accurate and up to date.
                    </p>
                </div>

                <div class="header-actions">
                    <a href="{{ route('recruiter.dashboard') }}"
                       class="btn btn-light btn-sm">
                        <i class="bi bi-arrow-left me-1"></i>
                        Dashboard
                    </a>
                </div>
            </div>
        </div>

        <div class="form-content">

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <div class="fw-bold mb-1">
                        Please correct the following errors:
                    </div>

                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger rounded-3">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('recruiter.company.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Company Logo --}}
                <div class="form-section">
                    <h2 class="section-heading">
                        <i class="bi bi-image"></i>
                        Company Branding
                    </h2>

                    <div class="logo-panel">
                        <div class="d-flex flex-column flex-sm-row
                                    align-items-sm-center gap-4">

                            <div class="logo-preview">
                                @if ($company->company_logo)
                                    <img
                                        id="logoPreview"
                                        src="{{ asset('storage/' . $company->company_logo) }}"
                                        alt="Company logo">
                                    <div id="logoPlaceholder"
                                         class="logo-placeholder"
                                         style="display:none;">
                                        <i class="bi bi-buildings"></i>
                                        No logo
                                    </div>
                                @else
                                    <img
                                        id="logoPreview"
                                        src=""
                                        alt="Company logo preview"
                                        style="display:none;">

                                    <div id="logoPlaceholder"
                                         class="logo-placeholder">
                                        <i class="bi bi-buildings"></i>
                                        No logo
                                    </div>
                                @endif
                            </div>

                            <div class="flex-grow-1">
                                <label for="company_logo"
                                       class="form-label">
                                    Upload Company Logo
                                </label>

                                <input type="file"
                                       name="company_logo"
                                       id="company_logo"
                                       class="form-control"
                                       accept=".jpg,.jpeg,.png,.webp">

                                <div class="helper-text mt-2">
                                    <i class="bi bi-info-circle me-1"></i>
                                    JPG, JPEG, PNG or WEBP. Maximum 2 MB.
                                    Leave empty to keep the current logo.
                                </div>

                                <div id="selectedFile"
                                     class="small mt-2"
                                     style="color:var(--green);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Basic Information --}}
                <div class="form-section">
                    <h2 class="section-heading">
                        <i class="bi bi-building"></i>
                        Basic Information
                    </h2>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="company_name" class="form-label">
                                Company Name <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="company_name"
                                   name="company_name"
                                   class="form-control"
                                   value="{{ old('company_name', $company->company_name ?? '') }}"
                                   maxlength="150"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="industry" class="form-label">
                                Industry <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="industry"
                                   name="industry"
                                   class="form-control"
                                   value="{{ old('industry', $company->industry ?? '') }}"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="col-md-6">
                            <label for="company_size" class="form-label">
                                Company Size
                            </label>

                            <select id="company_size"
                                    name="company_size"
                                    class="form-select">
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
                                        @selected(old('company_size', $company->company_size ?? '') === $size)>
                                        {{ $size }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="founded_year" class="form-label">
                                Founded Year
                            </label>

                            <input type="number"
                                   id="founded_year"
                                   name="founded_year"
                                   class="form-control"
                                   value="{{ old('founded_year', $company->founded_year ?? '') }}"
                                   min="1800"
                                   max="{{ date('Y') }}"
                                   placeholder="e.g. 2020">
                        </div>

                        <div class="col-12">
                            <label for="company_description"
                                   class="form-label">
                                Company Description
                                <span class="required">*</span>
                            </label>

                            <textarea id="company_description"
                                      name="company_description"
                                      class="form-control"
                                      rows="4"
                                      maxlength="5000"
                                      required>{{ old('company_description', $company->company_description ?? '') }}</textarea>

                            <div class="helper-text mt-1">
                                Describe your company, work culture and business.
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contact Information --}}
                <div class="form-section">
                    <h2 class="section-heading">
                        <i class="bi bi-telephone"></i>
                        Contact Information
                    </h2>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="company_email" class="form-label">
                                Company Email
                            </label>

                            <input type="email"
                                   id="company_email"
                                   name="company_email"
                                   class="form-control"
                                   value="{{ old('company_email', $company->company_email ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">
                                Phone Number
                            </label>

                            <input type="text"
                                   id="phone"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $company->phone ?? '') }}"
                                   maxlength="25">
                        </div>

                        <div class="col-md-6">
                            <label for="website" class="form-label">
                                Company Website
                            </label>

                            <input type="url"
                                   id="website"
                                   name="website"
                                   class="form-control"
                                   value="{{ old('website', $company->website ?? '') }}"
                                   placeholder="https://example.com">
                        </div>

                        <div class="col-md-6">
                            <label for="linkedin_url" class="form-label">
                                LinkedIn Page
                            </label>

                            <input type="url"
                                   id="linkedin_url"
                                   name="linkedin_url"
                                   class="form-control"
                                   value="{{ old('linkedin_url', $company->linkedin_url ?? '') }}"
                                   placeholder="https://linkedin.com/company/...">
                        </div>
                    </div>
                </div>

                {{-- Location --}}
                <div class="form-section">
                    <h2 class="section-heading">
                        <i class="bi bi-geo-alt"></i>
                        Company Location
                    </h2>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="address" class="form-label">
                                Street Address
                            </label>

                            <input type="text"
                                   id="address"
                                   name="address"
                                   class="form-control"
                                   value="{{ old('address', $company->address ?? '') }}"
                                   maxlength="255">
                        </div>

                        <div class="col-md-4">
                            <label for="city" class="form-label">
                                City <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="city"
                                   name="city"
                                   class="form-control"
                                   value="{{ old('city', $company->city ?? '') }}"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">
                                State <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="state"
                                   name="state"
                                   class="form-control"
                                   value="{{ old('state', $company->state ?? '') }}"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="col-md-4">
                            <label for="country" class="form-label">
                                Country <span class="required">*</span>
                            </label>

                            <input type="text"
                                   id="country"
                                   name="country"
                                   class="form-control"
                                   value="{{ old('country', $company->country ?? '') }}"
                                   maxlength="100"
                                   required>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="d-flex flex-column flex-sm-row
                            justify-content-between align-items-sm-center gap-3">
                            {{-- Delete Company --}}
    <form action="{{ route('recruiter.company.destroy') }}"
          method="POST"
          id="deleteCompanyForm"
          class="m-0">

        @csrf
        @method('DELETE')

        <button type="button"
                class="btn btn-outline-danger"
                id="deleteCompanyBtn">
            <i class="bi bi-trash3 me-1"></i>
            Delete Company
        </button>
    </form>

                    <div class="helper-text">
                        <i class="bi bi-shield-check me-1"></i>
                        Your changes will update your company profile.
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('recruiter.dashboard') }}"
                           class="btn btn-outline-secondary">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-green">
                            <i class="bi bi-check-circle me-1"></i>
                            Save Changes
                        </button>
                    </div>
                </div>

            </form>
            <div class="d-flex flex-column flex-sm-row
            justify-content-between align-items-sm-center gap-3 mt-4">

    
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('company_logo');
    const preview = document.getElementById('logoPreview');
    const placeholder = document.getElementById('logoPlaceholder');
    const selectedFile = document.getElementById('selectedFile');

    let previewUrl = null;

    input.addEventListener('change', function () {
        const file = this.files && this.files[0];

        if (!file) {
            selectedFile.textContent = '';
            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            this.value = '';
            selectedFile.textContent = 'Please select a JPG, PNG or WEBP image.';
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            this.value = '';
            selectedFile.textContent = 'Image must be 2 MB or smaller.';
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        preview.src = previewUrl;
        preview.style.display = 'block';

        if (placeholder) {
            placeholder.style.display = 'none';
        }

        selectedFile.innerHTML = '';

        const icon = document.createElement('i');
        icon.className = 'bi bi-check-circle me-1';

        selectedFile.appendChild(icon);
        selectedFile.appendChild(
            document.createTextNode(file.name)
        );
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Success message after updating the company
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: @json(session('success')),
            confirmButtonColor: '#21604A',
            confirmButtonText: 'Great!',
            timer: 2500,
            timerProgressBar: true
        });
    @endif

    // Error message from the controller
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Something went wrong',
            text: @json(session('error')),
            confirmButtonColor: '#21604A'
        });
    @endif

    // Validation errors
    @if ($errors->any())
        Swal.fire({
            icon: 'warning',
            title: 'Please check your details',
            html: `
                <ul style="text-align:left; padding-left:20px; margin-bottom:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            confirmButtonColor: '#21604A',
            confirmButtonText: 'Fix errors'
        });
    @endif

    // Confirmation before saving
    const form = document.querySelector('form[action="{{ route('recruiter.company.update') }}"]');

    if (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            Swal.fire({
                title: 'Save company changes?',
                text: 'Your company profile will be updated.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#21604A',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, save changes',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    }

});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButton = document.getElementById('deleteCompanyBtn');
    const deleteForm = document.getElementById('deleteCompanyForm');

    if (deleteButton && deleteForm) {
        deleteButton.addEventListener('click', function () {
            Swal.fire({
                title: 'Delete company?',
                text: 'Your company profile will be permanently deleted. This may affect your posted jobs.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete company',
                cancelButtonText: 'Keep company',
                reverseButtons: true,
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    }
});
</script>


</body>
</html>
