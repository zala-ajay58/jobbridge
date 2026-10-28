<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Jobs | JobBridge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --dark-green: #144432;
            --light-green: #edf5f0;
            --page-bg: #f5f8f6;
            --border: #e2eae5;
            --muted: #6b7b72;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--page-bg);
            color: #26372f;
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid var(--border);
        }

        .brand {
            color: var(--green);
            font-size: 1.4rem;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -.5px;
        }

        .brand:hover { color: var(--dark-green); }

        .btn-green {
            background: var(--green);
            border: 1px solid var(--green);
            color: white;
            font-weight: 600;
        }

        .btn-green:hover {
            background: var(--dark-green);
            border-color: var(--dark-green);
            color: white;
        }

        .hero {
            background: linear-gradient(115deg, var(--dark-green), #28775a);
            color: white;
            padding: 34px 0 45px;
        }

        .hero h1 {
            font-weight: 800;
            letter-spacing: -.8px;
        }

        .hero p { color: #e0eee6; }

        .search-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 12px;
            box-shadow: 0 12px 35px rgba(20, 68, 50, .12);
        }

        .search-field {
            min-height: 46px;
            border: 0;
            box-shadow: none !important;
        }

        .search-field:focus { outline: none; }

        .search-icon {
            display: flex;
            align-items: center;
            padding: 0 12px;
            color: var(--green);
            font-size: 1.15rem;
        }

        .main-content { padding: 30px 0 55px; }

        .filter-panel, .results-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
        }

        .filter-panel {
            position: sticky;
            top: 16px;
            overflow: hidden;
        }

        .filter-heading {
            padding: 17px 18px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .filter-body { padding: 18px; }

        .filter-label {
            display: block;
            font-size: .88rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #34483d;
        }

        .filter-group { margin-bottom: 21px; }

        .filter-control {
            border-color: #dce5df;
            border-radius: 9px;
            min-height: 42px;
            font-size: .9rem;
        }

        .filter-control:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 .18rem rgba(33, 96, 74, .1);
        }

        .filter-hint {
            font-size: .77rem;
            color: var(--muted);
            margin-top: 6px;
        }

        .results-header {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
        }

        .result-count {
            color: var(--muted);
            font-size: .88rem;
        }

        .job-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            height: 100%;
            transition: border-color .2s, box-shadow .2s, transform .2s;
        }

        .job-card:hover {
            border-color: #b6d2c2;
            box-shadow: 0 8px 24px rgba(20, 68, 50, .07);
            transform: translateY(-2px);
        }

        .company-logo, .logo-placeholder {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
            border-radius: 12px;
        }

        .company-logo {
            object-fit: contain;
            padding: 5px;
            border: 1px solid var(--border);
            background: white;
        }

        .logo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green);
            background: var(--light-green);
            font-size: 25px;
        }

        .company-name {
            color: var(--muted);
            font-size: .85rem;
            margin-bottom: 3px;
        }

        .job-title {
            font-size: 1.08rem;
            line-height: 1.4;
            font-weight: 750;
            color: #23372b;
            margin: 0;
            overflow-wrap: anywhere;
        }

        .salary {
            font-size: 1rem;
            color: var(--green);
            font-weight: 750;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .meta-item {
            background: #f4f7f5;
            border: 1px solid #edf1ee;
            border-radius: 7px;
            padding: 6px 9px;
            font-size: .79rem;
            color: #46574d;
        }

        .meta-item i {
            color: var(--green);
            margin-right: 4px;
        }

        .skill-tag {
            display: inline-block;
            background: var(--light-green);
            color: var(--green);
            padding: 5px 9px;
            margin: 3px 3px 0 0;
            border-radius: 20px;
            font-size: .76rem;
            font-weight: 600;
        }

        .job-footer {
            border-top: 1px solid #edf1ee;
            margin-top: 16px;
            padding-top: 14px;
        }

        .empty-state {
            background: white;
            border: 1px dashed #cbd9d0;
            border-radius: 14px;
            padding: 48px 20px;
        }

        .empty-icon {
            width: 66px;
            height: 66px;
            border-radius: 50%;
            background: var(--light-green);
            color: var(--green);
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
        }

        .active-filter {
            background: var(--light-green);
            color: var(--green);
            border: 1px solid #d4e7da;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: .78rem;
        }

        .mobile-filter-btn { display: none; }

        @media (max-width: 991px) {
            .filter-panel { position: static; }
            .mobile-filter-btn { display: inline-flex; }
        }

        @media (max-width: 575px) {
            .hero { padding: 27px 0 36px; }
            .hero h1 { font-size: 1.8rem; }
            .main-content { padding-top: 20px; }
            .job-card { padding: 16px; }
            .results-header { padding: 15px; }
        }
    </style>
</head>

<body>

<nav class="navbar py-3">
    <div class="container">
        <a href="{{ route('home') }}" class="brand">
            <i class="bi bi-briefcase-fill me-2"></i>JobBridge
        </a>

        <a href="{{ route('home') }}" class="btn btn-outline-success btn-sm">
            <i class="bi bi-house me-1"></i> Home
        </a>
    </div>
</nav>

<header class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <span class="badge rounded-pill mb-3 px-3 py-2"
                      style="background:rgba(255,255,255,.14);color:white">
                    <i class="bi bi-stars me-1"></i> Your next opportunity starts here
                </span>

                <h1 class="mb-2">Find a job that fits your future.</h1>
                <p class="mb-0">Explore opportunities, compare salaries and find the right workplace for you.</p>
            </div>
        </div>

        <form action="{{ route('candidate.jobs.index') }}" method="GET"
              class="search-panel mt-4">
            <div class="row g-2 align-items-center">
                <div class="col-12 col-md">
                    <div class="d-flex align-items-center">
                        <span class="search-icon"><i class="bi bi-search"></i></span>
                        <input type="search" name="q" id="keywordSearch"
                               class="form-control search-field"
                               value="{{ $q ?? request('q') }}"
                               placeholder="Job title, company or skill">
                    </div>
                </div>

                <div class="col-12 col-md-4 border-md-start">
                    <div class="d-flex align-items-center">
                        <span class="search-icon"><i class="bi bi-geo-alt"></i></span>
                        <input type="text" name="location" id="locationSearch"
                               class="form-control search-field"
                               value="{{ $location ?? request('location') }}"
                               placeholder="City or location">
                    </div>
                </div>

                <div class="col-12 col-md-auto">
                    <button type="submit" class="btn btn-green w-100 px-4 py-2">
                        Search Jobs <i class="bi bi-arrow-right ms-1"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</header>

<main class="container main-content">

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row g-4">

        {{-- FILTER SIDEBAR --}}
        <aside class="col-12 col-lg-3">
            <div class="filter-panel">
                <div class="filter-heading">
                    <h2 class="h6 fw-bold mb-0">
                        <i class="bi bi-sliders me-2 text-success"></i>Filter Jobs
                    </h2>
                    <button type="button" id="clearFilters"
                            class="btn btn-link btn-sm text-success text-decoration-none p-0">
                        Clear all
                    </button>
                </div>

                <div class="filter-body collapse d-lg-block" id="filterContent">

                    <div class="filter-group">
                        <label class="filter-label" for="filterKeyword">Keyword</label>
                        <input type="search" id="filterKeyword"
                               class="form-control filter-control"
                               placeholder="Title, company or skill"
                               value="{{ $q ?? request('q') }}">
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="filterLocation">Location</label>
                        <input type="text" id="filterLocation"
                               class="form-control filter-control"
                               placeholder="e.g. Ahmedabad"
                               value="{{ $location ?? request('location') }}">
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Monthly equivalent salary (LPA)</label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="number" min="0" step="0.1"
                                       id="salaryMin"
                                       class="form-control filter-control"
                                       placeholder="Minimum"
                                       aria-label="Minimum salary in LPA">
                            </div>
                            <div class="col-6">
                                <input type="number" min="0" step="0.1"
                                       id="salaryMax"
                                       class="form-control filter-control"
                                       placeholder="Maximum"
                                       aria-label="Maximum salary in LPA">
                            </div>
                        </div>
                        <div class="filter-hint">Example: 3 to 6 means ₹3–6 LPA.</div>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="filterExperience">Experience</label>
                        <select id="filterExperience" class="form-select filter-control">
                            <option value="">Any experience</option>
                            <option value="fresher">Fresher / 0 years</option>
                            <option value="0-1">0–1 years</option>
                            <option value="1-3">1–3 years</option>
                            <option value="3-5">3–5 years</option>
                            <option value="5-plus">5+ years</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="filterEmployment">Employment Type</label>
                        <select id="filterEmployment" class="form-select filter-control">
                            <option value="">All employment types</option>
                            <option value="full time">Full-time</option>
                            <option value="part time">Part-time</option>
                            <option value="internship">Internship</option>
                            <option value="contract">Contract</option>
                            <option value="temporary">Temporary</option>
                            <option value="freelance">Freelance</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label" for="filterWorkMode">Work Mode</label>
                        <select id="filterWorkMode" class="form-select filter-control">
                            <option value="">All work modes</option>
                            <option value="on-site">On-site</option>
                            <option value="remote">Remote</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                    </div>

                    <div class="filter-group mb-0">
                        <label class="filter-label" for="filterSort">Sort by</label>
                        <select id="filterSort" class="form-select filter-control">
                            <option value="default">Default order</option>
                            <option value="salary-high">Salary: High to low</option>
                            <option value="salary-low">Salary: Low to high</option>
                            <option value="experience-low">Experience: Low to high</option>
                            <option value="title">Job title: A–Z</option>
                        </select>
                    </div>

                </div>
            </div>
        </aside>

        {{-- JOB RESULTS --}}
        <section class="col-12 col-lg-9">

            <div class="results-panel mb-3">
                <div class="results-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <h2 class="h5 fw-bold mb-1">
                            @if(!empty($q) || !empty($location))
                                Search Results
                            @else
                                Explore Latest Jobs
                            @endif
                        </h2>
                        <div class="result-count" id="jobCount">
                            {{ $jobs->count() }} jobs available
                        </div>
                    </div>

                    <button class="btn btn-outline-success btn-sm mobile-filter-btn"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#filterContent"
                            aria-expanded="false"
                            aria-controls="filterContent">
                        <i class="bi bi-sliders me-1"></i> Filters
                    </button>
                </div>

                <div class="px-3 px-md-4 py-3 d-flex flex-wrap gap-2"
                     id="activeFilters" style="display:none !important">
                </div>
            </div>

            <div class="row g-3" id="jobList">

                @forelse($jobs as $job)

                    @php
                        $skills = $job->skills ?? [];

                        if (is_string($skills)) {
                            $skills = array_filter(array_map('trim', explode(',', $skills)));
                        }

                        if (!is_array($skills)) {
                            $skills = [];
                        }

                        $logo = $job->company_logo ?? null;

                        $logoUrl = $logo
                            ? (preg_match('/^https?:\/\//i', $logo)
                                ? $logo
                                : asset('storage/' . ltrim($logo, '/')))
                            : null;

                        $minExp = is_numeric($job->experience_min ?? null)
                            ? (float) $job->experience_min : null;

                        $maxExp = is_numeric($job->experience_max ?? null)
                            ? (float) $job->experience_max : null;

                        $minSalary = is_numeric($job->salary_min_lpa ?? null)
                            ? (float) $job->salary_min_lpa : null;

                        $maxSalary = is_numeric($job->salary_max_lpa ?? null)
                            ? (float) $job->salary_max_lpa : null;

                        $searchText = implode(' ', [
                            $job->job_title ?? '',
                            $job->company_name ?? '',
                            $job->location ?? '',
                            $job->job_type ?? '',
                            $job->work_mode ?? '',
                            implode(' ', $skills),
                            $job->qualification ?? '',
                        ]);
                    @endphp

                    <div class="col-12 job-item"
                         data-search="{{ strtolower($searchText) }}"
                         data-location="{{ strtolower($job->location ?? '') }}"
                         data-min-salary="{{ $minSalary ?? '' }}"
                         data-max-salary="{{ $maxSalary ?? '' }}"
                         data-min-exp="{{ $minExp ?? '' }}"
                         data-max-exp="{{ $maxExp ?? '' }}"
                         data-job-type="{{ strtolower(str_replace(['-', '_'], ' ', $job->job_type ?? '')) }}"
                         data-work-mode="{{ strtolower(str_replace(['_', ' '], '-', $job->work_mode ?? '')) }}"
                         data-title="{{ strtolower($job->job_title ?? '') }}">

                        <article class="job-card">

                            <div class="d-flex gap-3 align-items-start">

                                @if($logoUrl)
                                    <img src="{{ $logoUrl }}"
                                         alt="{{ $job->company_name ?? 'Company' }} logo"
                                         class="company-logo"
                                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">

                                    <div class="logo-placeholder" style="display:none">
                                        <i class="bi bi-building"></i>
                                    </div>
                                @else
                                    <div class="logo-placeholder">
                                        <i class="bi bi-building"></i>
                                    </div>
                                @endif

                                <div class="flex-grow-1 min-w-0">
                                    <div class="company-name text-truncate">
                                        {{ $job->company_name ?: 'Company not specified' }}
                                    </div>

                                    <h3 class="job-title">
                                        {{ $job->job_title ?: 'Untitled position' }}
                                    </h3>

                                    <div class="text-secondary small mt-2">
                                        <i class="bi bi-geo-alt me-1 text-success"></i>
                                        {{ $job->location ?: 'Location not specified' }}
                                    </div>
                                </div>
                            </div>

                            <div class="salary mt-3 mb-3">
                                <i class="bi bi-currency-rupee me-1"></i>

                                @if($minSalary !== null && $maxSalary !== null)
                                    {{ number_format($minSalary, 1) }}–{{ number_format($maxSalary, 1) }} LPA
                                @elseif($minSalary !== null)
                                    {{ number_format($minSalary, 1) }} LPA onwards
                                @elseif($maxSalary !== null)
                                    Up to {{ number_format($maxSalary, 1) }} LPA
                                @else
                                    Salary not disclosed
                                @endif
                            </div>

                            <div class="job-meta mb-3">
                                <span class="meta-item">
                                    <i class="bi bi-briefcase"></i>
                                    @if($minExp !== null && $maxExp !== null)
                                        {{ $minExp }}–{{ $maxExp }} years
                                    @elseif($minExp !== null)
                                        {{ $minExp }}+ years
                                    @else
                                        Experience not specified
                                    @endif
                                </span>

                                <span class="meta-item">
                                    <i class="bi bi-clock"></i>
                                    {{ $job->job_type ?: 'Type not specified' }}
                                </span>

                                <span class="meta-item">
                                    <i class="bi bi-laptop"></i>
                                    {{ $job->work_mode ?: 'Work mode not specified' }}
                                </span>
                            </div>

                            @if(count($skills))
                                <div class="mb-1">
                                    @foreach(array_slice($skills, 0, 5) as $skill)
                                        <span class="skill-tag">{{ $skill }}</span>
                                    @endforeach

                                    @if(count($skills) > 5)
                                        <span class="text-secondary small">
                                            +{{ count($skills) - 5 }} more
                                        </span>
                                    @endif
                                </div>
                            @endif

                            <div class="job-footer">
                                <a href="{{ route('candidate.jobs.show', ['id' => (string) $job->_id]) }}"
                                   class="btn btn-green w-100">
                                    View Job Details
                                    <i class="bi bi-arrow-up-right ms-1"></i>
                                </a>
                            </div>

                        </article>
                    </div>

                @empty
                    <div class="col-12" id="emptyJobs">
                        <div class="empty-state text-center">
                            <div class="empty-icon mb-3">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <h3 class="h5 fw-bold">No jobs available yet</h3>
                            <p class="text-secondary mb-0">
                                Please check back later for new opportunities.
                            </p>
                        </div>
                    </div>
                @endforelse

                <div class="col-12" id="noSearchResults" style="display:none">
                    <div class="empty-state text-center">
                        <div class="empty-icon mb-3">
                            <i class="bi bi-search"></i>
                        </div>
                        <h3 class="h5 fw-bold">No matching jobs found</h3>
                        <p class="text-secondary">
                            Try changing your keywords or adjusting the filters.
                        </p>
                        <button type="button" class="btn btn-green" id="emptyClearFilters">
                            Clear all filters
                        </button>
                    </div>
                </div>

            </div>
        </section>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const keywordSearch = document.getElementById('keywordSearch');
    const locationSearch = document.getElementById('locationSearch');
    const filterKeyword = document.getElementById('filterKeyword');
    const filterLocation = document.getElementById('filterLocation');
    const salaryMin = document.getElementById('salaryMin');
    const salaryMax = document.getElementById('salaryMax');
    const experience = document.getElementById('filterExperience');
    const employment = document.getElementById('filterEmployment');
    const workMode = document.getElementById('filterWorkMode');
    const sortBy = document.getElementById('filterSort');

    const jobList = document.getElementById('jobList');
    const countLabel = document.getElementById('jobCount');
    const noResults = document.getElementById('noSearchResults');
    const emptyJobs = document.getElementById('emptyJobs');
    const activeFilters = document.getElementById('activeFilters');

    const cards = Array.from(document.querySelectorAll('.job-item'));

    function normalize(value) {
        return String(value ?? '')
            .toLowerCase()
            .replace(/[_-]+/g, ' ')
            .replace(/\s+/g, ' ')
            .trim();
    }

    function numberOrNull(value) {
        if (value === '' || value === null || value === undefined) {
            return null;
        }

        const number = Number(value);
        return Number.isFinite(number) ? number : null;
    }

    function matchesExperience(card, selected) {
        if (!selected) return true;

        const min = numberOrNull(card.dataset.minExp);
        const max = numberOrNull(card.dataset.maxExp);

        // Unknown experience is not assumed to be a match.
        if (min === null && max === null) return false;

        const lower = min ?? max;
        const upper = max ?? min;

        switch (selected) {
            case 'fresher':
                return lower <= 0 && upper >= 0;

            case '0-1':
                return lower <= 1 && upper >= 0;

            case '1-3':
                return lower <= 3 && upper >= 1;

            case '3-5':
                return lower <= 5 && upper >= 3;

            case '5-plus':
                return upper >= 5;

            default:
                return true;
        }
    }

    function matchesSalary(card, minWanted, maxWanted) {
        const min = numberOrNull(card.dataset.minSalary);
        const max = numberOrNull(card.dataset.maxSalary);

        if (minWanted === null && maxWanted === null) return true;

        // Jobs without salary data cannot be confirmed against a salary range.
        if (min === null && max === null) return false;

        const jobMin = min ?? max;
        const jobMax = max ?? min;

        if (minWanted !== null && jobMax < minWanted) return false;
        if (maxWanted !== null && jobMin > maxWanted) return false;

        return true;
    }

    function getActiveFilters() {
        const filters = [];

        if (filterKeyword.value.trim()) {
            filters.push('Keyword: ' + filterKeyword.value.trim());
        }

        if (filterLocation.value.trim()) {
            filters.push('Location: ' + filterLocation.value.trim());
        }

        if (salaryMin.value !== '') {
            filters.push('Min salary: ' + salaryMin.value + ' LPA');
        }

        if (salaryMax.value !== '') {
            filters.push('Max salary: ' + salaryMax.value + ' LPA');
        }

        if (experience.value) {
            filters.push('Experience: ' + experience.options[experience.selectedIndex].text);
        }

        if (employment.value) {
            filters.push('Type: ' + employment.options[employment.selectedIndex].text);
        }

        if (workMode.value) {
            filters.push('Mode: ' + workMode.options[workMode.selectedIndex].text);
        }

        return filters;
    }

    function updateActiveFilters() {
        const filters = getActiveFilters();
        activeFilters.replaceChildren();

        if (filters.length === 0) {
            activeFilters.style.setProperty('display', 'none', 'important');
            return;
        }

        activeFilters.style.setProperty('display', 'flex', 'important');

        filters.forEach(function (filter) {
            const tag = document.createElement('span');
            tag.className = 'active-filter';
            tag.textContent = filter;
            activeFilters.appendChild(tag);
        });
    }

    function filterJobs() {
        const query = normalize(filterKeyword.value);
        const location = normalize(filterLocation.value);
        const minWanted = numberOrNull(salaryMin.value);
        const maxWanted = numberOrNull(salaryMax.value);
        const selectedExperience = experience.value;
        const selectedEmployment = normalize(employment.value);
        const selectedMode = normalize(workMode.value);

        let visible = 0;

        cards.forEach(function (card) {
            const searchText = normalize(card.dataset.search);
            const jobLocation = normalize(card.dataset.location);
            const jobType = normalize(card.dataset.jobType);
            const jobMode = normalize(card.dataset.workMode);

            const keywordMatch = !query || searchText.includes(query);
            const locationMatch = !location || jobLocation.includes(location);
            const salaryMatch = matchesSalary(card, minWanted, maxWanted);
            const experienceMatch = matchesExperience(card, selectedExperience);
            const employmentMatch = !selectedEmployment ||
                jobType === selectedEmployment;
            const modeMatch = !selectedMode ||
                jobMode === selectedMode;

            const matched = keywordMatch &&
                locationMatch &&
                salaryMatch &&
                experienceMatch &&
                employmentMatch &&
                modeMatch;

            card.style.display = matched ? '' : 'none';

            if (matched) visible++;
        });

        // Sort only the cards that match the current filters.
        const visibleCards = cards.filter(card => card.style.display !== 'none');

        visibleCards.sort(function (a, b) {
            const salaryA = numberOrNull(a.dataset.maxSalary) ?? -1;
            const salaryB = numberOrNull(b.dataset.maxSalary) ?? -1;
            const expA = numberOrNull(a.dataset.minExp) ?? 999;
            const expB = numberOrNull(b.dataset.minExp) ?? 999;
            const titleA = a.dataset.title || '';
            const titleB = b.dataset.title || '';

            switch (sortBy.value) {
                case 'salary-high':
                    return salaryB - salaryA;
                case 'salary-low':
                    return (salaryA < 0 ? Infinity : salaryA) -
                           (salaryB < 0 ? Infinity : salaryB);
                case 'experience-low':
                    return expA - expB;
                case 'title':
                    return titleA.localeCompare(titleB);
                default:
                    return cards.indexOf(a) - cards.indexOf(b);
            }
        });

        visibleCards.forEach(card => jobList.appendChild(card));

        countLabel.textContent = visible + ' of ' + cards.length +
            (cards.length === 1 ? ' job shown' : ' jobs shown');

        noResults.style.display =
            cards.length > 0 && visible === 0 ? '' : 'none';

        if (emptyJobs) {
            emptyJobs.style.display = cards.length === 0 ? '' : 'none';
        }

        updateActiveFilters();
    }

    function syncSearchFields(source, target) {
        target.value = source.value;
        filterJobs();
    }

    keywordSearch.addEventListener('input', function () {
        syncSearchFields(keywordSearch, filterKeyword);
    });

    filterKeyword.addEventListener('input', function () {
        syncSearchFields(filterKeyword, keywordSearch);
    });

    locationSearch.addEventListener('input', function () {
        syncSearchFields(locationSearch, filterLocation);
    });

    filterLocation.addEventListener('input', function () {
        syncSearchFields(filterLocation, locationSearch);
    });

    [salaryMin, salaryMax, experience, employment, workMode, sortBy]
        .forEach(function (control) {
            control.addEventListener('input', filterJobs);
            control.addEventListener('change', filterJobs);
        });

    function clearAllFilters() {
        keywordSearch.value = '';
        locationSearch.value = '';
        filterKeyword.value = '';
        filterLocation.value = '';
        salaryMin.value = '';
        salaryMax.value = '';
        experience.value = '';
        employment.value = '';
        workMode.value = '';
        sortBy.value = 'default';

        filterJobs();
    }

    document.getElementById('clearFilters')
        .addEventListener('click', clearAllFilters);

    document.getElementById('emptyClearFilters')
        .addEventListener('click', clearAllFilters);

    // Keep the initial filters from the URL/search form.
    filterJobs();
});
</script>

</body>
</html>