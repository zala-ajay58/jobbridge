<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body { background: #f4f7f5; color: #26372f; }
        .navbar { background: #21604A; }
        .brand { color: white; font-weight: 700; font-size: 1.3rem; text-decoration: none; }
        .form-card { border: 0; border-radius: 14px; }
        .form-label { font-weight: 600; }
        .form-control, .form-select { border-radius: 8px; }
    </style>
</head>
<body>

<nav class="navbar px-3 px-md-5 py-3">
    <a class="brand" href="{{ route('recruiter.dashboard') }}">JobBridge</a>
    <a href="{{ route('recruiter.jobs.index') }}" class="btn btn-outline-light btn-sm">
        Back to My Job Posts
    </a>
</nav>

<div class="container py-4 py-md-5" style="max-width:950px">

    <h2 class="fw-bold mb-1">Edit Job Post</h2>
    <p class="text-secondary mb-4">Update the information for this job listing.</p>

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

    <div class="card form-card shadow-sm">
        <div class="card-body p-3 p-md-4">

            <div class="alert alert-light border mb-4">
                <strong>Company:</strong>
                {{ $job->company_name ?: 'Your company' }}
                <br>
                <strong>Location:</strong> {{ $job->company_city ?: $job->location }}
                <div class="small text-secondary mt-1">
                    Company ownership details cannot be changed here.
                </div>
            </div>

            <form method="POST"
                  action="{{ route('recruiter.jobs.update', ['id' => (string) $job->_id]) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-12">
                        <label class="form-label">Job Title</label>
                        <input type="text" name="job_title" class="form-control"
                               value="{{ old('job_title', $job->job_title) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Job Type</label>
                        <select name="job_type" class="form-select" required>
                            @foreach(['Full-time', 'Part-time', 'Contract', 'Internship', 'Temporary'] as $type)
                                <option value="{{ $type }}"
                                    @selected(old('job_type', $job->job_type) === $type)>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Work Mode</label>
                        <select name="work_mode" class="form-select" required>
                            @foreach(['On-site', 'Remote', 'Hybrid'] as $mode)
                                <option value="{{ $mode }}"
                                    @selected(old('work_mode', $job->work_mode) === $mode)>
                                    {{ $mode }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Job Location</label>
                        <input type="text" name="location" class="form-control"
                               value="{{ old('location', $job->location) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Required Qualification</label>
                        <input type="text" name="qualification" class="form-control"
                               value="{{ old('qualification', $job->qualification) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Minimum Experience (years)</label>
                        <input type="number" name="experience_min" class="form-control"
                               min="0" max="50"
                               value="{{ old('experience_min', $job->experience_min) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Maximum Experience (years)</label>
                        <input type="number" name="experience_max" class="form-control"
                               min="0" max="50"
                               value="{{ old('experience_max', $job->experience_max) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Minimum Salary (LPA)</label>
                        <input type="number" name="salary_min_lpa" class="form-control"
                               min="0" step="0.1"
                               value="{{ old('salary_min_lpa', $job->salary_min_lpa) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Maximum Salary (LPA)</label>
                        <input type="number" name="salary_max_lpa" class="form-control"
                               min="0" step="0.1"
                               value="{{ old('salary_max_lpa', $job->salary_max_lpa) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Total Vacancies</label>
                        <input type="number" name="total_vacancies" class="form-control"
                               min="1"
                               value="{{ old('total_vacancies', $job->total_vacancies) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Required Skills</label>
                        <input type="text" name="skills" class="form-control"
                               value="{{ old('skills', is_array($job->skills) ? implode(', ', $job->skills) : $job->skills) }}"
                               placeholder="PHP, Laravel, MySQL" required>
                        <div class="form-text">Separate skills with commas.</div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Job Description</label>
                        <textarea name="description" rows="7" class="form-control"
                                  required>{{ old('description', $job->description) }}</textarea>
                    </div>

                    <div class="col-12 d-flex flex-wrap gap-2 pt-2">
                        <button type="submit" class="btn btn-success"
                                style="background:#21604A;border-color:#21604A">
                            Save Changes
                        </button>

                        <a href="{{ route('recruiter.jobs.index') }}"
                           class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
