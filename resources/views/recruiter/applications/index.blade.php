
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Review Applications | JobBridge</title>

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
            --muted: #6b7b72;
        }

        body {
            background: #f5f8f6;
            color: #25352d;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            color: var(--green);
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
        }

        .page-title {
            color: var(--dark-green);
            font-weight: 800;
        }

        .stat-card, .content-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        .stat-card {
            padding: 20px;
            height: 100%;
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--light-green);
            color: var(--green);
            font-size: 22px;
        }

        .stat-number {
            color: var(--dark-green);
            font-size: 28px;
            font-weight: 800;
        }

        .content-card {
            padding: 24px;
            box-shadow: 0 4px 15px rgba(20, 68, 50, .04);
        }

        .btn-green {
            background: var(--green);
            color: white;
            border-color: var(--green);
        }

        .btn-green:hover {
            background: var(--dark-green);
            color: white;
        }

        .table th {
            background: #f1f6f3;
            color: var(--dark-green);
            font-size: 13px;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .candidate-name {
            font-weight: 700;
        }

        .candidate-contact {
            font-size: 13px;
            color: var(--muted);
            overflow-wrap: anywhere;
        }

        .status-pill {
            display: inline-block;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-reviewed {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-shortlisted {
            background: #d1fae5;
            color: #065f46;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-hired {
            background: #e9d5ff;
            color: #6b21a8;
        }

        .filter-input {
            max-width: 340px;
        }

        @media (max-width: 576px) {
            .content-card {
                padding: 15px;
            }
        }
        
.search-box {
    position: relative;
    width: 100%;
    max-width: 340px;
}

.search-box .filter-input {
    width: 100%;
    height: 46px;
    padding: 10px 45px 10px 42px;
    border: 1px solid #dce7e0;
    border-radius: 12px;
    background: #ffffff;
    color: #25352d;
    font-size: 14px;
    box-shadow: 0 2px 6px rgba(20, 68, 50, 0.03);
    transition: border-color 0.2s ease,
                box-shadow 0.2s ease;
}

.search-box .filter-input::placeholder {
    color: #8a9890;
}

.search-box .filter-input:focus {
    border-color: #21604A;
    outline: none;
    box-shadow: 0 0 0 3px rgba(33, 96, 74, 0.12);
}

.search-icon {
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #21604A;
    font-size: 16px;
    pointer-events: none;
    z-index: 2;
}

.search-shortcut {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    color: #21604A;
    font-size: 16px;
    pointer-events: none;
}

@media (max-width: 576px) {
    .search-box {
        max-width: 100%;
    }
}

    </style>
</head>

<body>

<nav class="navbar">
    <div class="container py-3">
        <a href="{{ route('recruiter.dashboard') }}" class="brand">
            Job<span style="color: var(--dark-green)">Bridge</span>
        </a>

        <a href="{{ route('recruiter.dashboard') }}"
           class="btn btn-outline-success btn-sm">
            <i class="bi bi-arrow-left me-1"></i>
            Dashboard
        </a>
    </div>
</nav>

<main class="container py-4 py-md-5">

    <div class="mb-4">
        <p class="text-secondary mb-1">Recruiter Workspace</p>

        <h1 class="page-title h2 mb-2">
            <i class="bi bi-people me-2"></i>
            Review Applications
        </h1>

        <p class="text-secondary mb-0">
            Review candidates who have applied for your job openings.
        </p>
    </div>

    <!-- Summary cards -->
    <div class="row g-3 mb-4">

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon mb-3">
                    <i class="bi bi-people"></i>
                </div>
                <div class="text-secondary small">Total Applications</div>
                <div class="stat-number">{{ $total }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon mb-3">
                    <i class="bi bi-hourglass-split"></i>
                </div>
                <div class="text-secondary small">Pending</div>
                <div class="stat-number">{{ $pending }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon mb-3">
                    <i class="bi bi-star"></i>
                </div>
                <div class="text-secondary small">Shortlisted</div>
                <div class="stat-number">{{ $shortlisted }}</div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon mb-3">
                    <i class="bi bi-person-check"></i>
                </div>
                <div class="text-secondary small">Hired</div>
                <div class="stat-number">{{ $hired }}</div>
            </div>
        </div>

    </div>

    <!-- Applications table -->
    <section class="content-card">

        <div class="d-flex flex-column flex-md-row
                    justify-content-between align-items-md-center
                    gap-3 mb-4">

            <div>
                <h2 class="h5 fw-bold mb-1">Candidate Applications</h2>
                <p class="text-secondary small mb-0">
                    Applications received for your jobs
                </p>
            </div>



<div class="search-box">
    <i class="bi bi-search search-icon"></i>

    <input type="search"
           id="applicationSearch"
           class="form-control filter-input"
           placeholder="Search job or candidate..."
           aria-label="Search job or candidate">

    
</div>

            
<div class="d-flex flex-column flex-sm-row gap-2"
     style="min-width: 0;">

   

    <select id="applicationStatusFilter"
            class="form-select"
            aria-label="Filter applications by status"
            style="min-width: 170px;">
        <option value="all">All Statuses</option>
        <option value="pending">Pending</option>
        <option value="reviewed">Reviewed</option>
        <option value="shortlisted">Shortlisted</option>
        <option value="rejected">Rejected</option>
        <option value="hired">Hired</option>
    </select>

</div>

        </div>

        @if($applications->isEmpty())

            <div class="text-center py-5">
                <i class="bi bi-inbox display-4"
                   style="color: var(--green);"></i>

                <h3 class="h5 fw-bold mt-3">No applications yet</h3>

                <p class="text-secondary">
                    Applications will appear here when candidates apply to your jobs.
                </p>
            </div>

        @else

            <div class="table-responsive">
                <table class="table table-hover align-middle"
                       id="applicationsTable">

                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Applied For</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Resume</th>
                            <th>Review Status</th>
                        </tr>
                    </thead>

                    <tbody>
                    @foreach($applications as $application)

                        @php
                            $status = strtolower($application->status ?? 'pending');

                            $statusClass = in_array($status, [
                                'pending',
                                'reviewed',
                                'shortlisted',
                                'rejected',
                                'hired'
                            ]) ? 'status-' . $status : 'status-pending';
                        @endphp

<tr class="application-row" data-status="{{ $status }}">
                            <td>
                                <div class="candidate-name">
                                    {{ $application->full_name ?? 'Name unavailable' }}
                                </div>

                                <div class="candidate-contact mt-1">
                                    <i class="bi bi-envelope me-1"></i>
                                    {{ $application->email ?? 'No email' }}
                                </div>

                                <div class="candidate-contact mt-1">
                                    <i class="bi bi-telephone me-1"></i>
                                    {{ $application->contact_number ?? 'No phone' }}
                                </div>
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $application->job_title ?? 'Job unavailable' }}
                                </div>

                                <div class="candidate-contact mt-1">
                                    {{ $application->company_name ?? '' }}
                                </div>
                            </td>

                            <td>
                                {{ $application->created_at
                                    ? $application->created_at->format('d M Y')
                                    : 'Not available' }}
                            </td>

                            <td>
                                <span class="status-pill {{ $statusClass }}">
                                    {{ ucfirst($status) }}
                                </span>
                            </td>

                            <td>
                                @if(!empty($application->resume_path))
                                    <a href="{{ route('recruiter.applications.resume', [
                                            'id' => (string) $application->_id
                                        ]) }}"
                                       class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-download me-1"></i>
                                        Download CV
                                    </a>
                                @else
                                    <span class="text-secondary small">
                                        No resume
                                    </span>
                                @endif
                            </td>

                            <td>
                                <form method="POST"
                                      action="{{ route('recruiter.applications.status', [
                                          'id' => (string) $application->_id
                                      ]) }}"
                                      class="status-form">

                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                            class="form-select form-select-sm mb-2 status-select"
                                            aria-label="Application status">

                                        @foreach([
                                            'pending' => 'Pending',
                                            'reviewed' => 'Reviewed',
                                            'shortlisted' => 'Shortlisted',
                                            'rejected' => 'Rejected',
                                            'hired' => 'Hired'
                                        ] as $value => $label)

                                            <option value="{{ $value }}"
                                                @selected($status === $value)>
                                                {{ $label }}
                                            </option>

                                        @endforeach
                                    </select>

                                    <button type="submit"
                                            class="btn btn-green btn-sm w-100">
                                        <i class="bi bi-check2-circle me-1"></i>
                                        Update
                                    </button>

                                </form>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>

                </table>
            </div>

            <div id="noSearchResults"
                 class="text-center text-secondary py-4 d-none">
                No matching applications found.
            </div>

        @endif

    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Search candidates by name, email, phone, or job title.
    
const searchInput = document.getElementById('applicationSearch');
const statusFilter = document.getElementById('applicationStatusFilter');
const rows = document.querySelectorAll('.application-row');
const noResults = document.getElementById('noSearchResults');

function filterApplications() {
    const query = searchInput
        ? searchInput.value.toLowerCase().trim()
        : '';

    const selectedStatus = statusFilter
        ? statusFilter.value
        : 'all';

    let visibleCount = 0;

    rows.forEach(function (row) {
        const matchesSearch = row.innerText
            .toLowerCase()
            .includes(query);

        const matchesStatus =
            selectedStatus === 'all' ||
            row.dataset.status === selectedStatus;

        const isVisible = matchesSearch && matchesStatus;

        row.style.display = isVisible ? '' : 'none';

        if (isVisible) {
            visibleCount++;
        }
    });

    if (noResults) {
        noResults.classList.toggle(
            'd-none',
            visibleCount !== 0 || rows.length === 0
        );
    }
}

if (searchInput) {
    searchInput.addEventListener('input', filterApplications);
}

if (statusFilter) {
    statusFilter.addEventListener('change', filterApplications);
}


    // Confirm before changing an application status.
    document.querySelectorAll('.status-form').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const selected = form.querySelector('.status-select');
            const newStatus = selected.options[selected.selectedIndex].text;

            Swal.fire({
                title: 'Update application?',
                text: 'Change this application status to ' + newStatus + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, update',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#21604A'
            }).then(function (result) {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    @if(session('success'))
        Swal.fire({
            title: 'Success!',
            text: @json(session('success')),
            icon: 'success',
            confirmButtonColor: '#21604A'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            title: 'Unable to complete',
            text: @json(session('error')),
            icon: 'error',
            confirmButtonColor: '#21604A'
        });
    @endif
</script>

</body>
</html>
