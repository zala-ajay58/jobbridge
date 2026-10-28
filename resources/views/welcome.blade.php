<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#21604A">

    <title>JobBridge | Find Jobs & Build Your Career</title>
    <meta name="description" content="Discover jobs, internships and career opportunities with JobBridge. Connect talented candidates with recruiters.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --green: #21604A;
            --green-dark: #144432;
            --green-deep: #103728;
            --green-light: #edf5f0;
            --green-soft: #f5faf6;
            --text: #202b25;
            --muted: #6d7b72;
            --border: #e0e9e2;
            --white: #fff;
            --shadow: 0 14px 40px rgba(22, 62, 43, .08);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            margin: 0;
            color: var(--text);
            background: #fff;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
        }

        button,
        input {
            font: inherit;
        }

        /* Navigation */

        .main-navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(12px);
        }

        .navbar-brand {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: var(--green) !important;
            font-size: 25px;
            font-weight: 850;
            letter-spacing: -1px;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            color: white;
            background: var(--green);
            border-radius: 12px;
            font-size: 19px;
        }

        .nav-link {
            margin: 0 4px;
            padding: 10px 12px !important;
            color: #455249;
            font-size: 14px;
            font-weight: 600;
            transition: color .2s;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: var(--green);
        }

        .btn-green,
        .btn-outline-green {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 43px;
            padding: 10px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            transition: all .2s ease;
        }

        .btn-green {
            color: #fff;
            background: var(--green);
            border: 1px solid var(--green);
        }

        .btn-green:hover {
            color: #fff;
            background: var(--green-dark);
            border-color: var(--green-dark);
            transform: translateY(-1px);
        }

        .btn-outline-green {
            color: var(--green);
            background: white;
            border: 1px solid #b9cec0;
        }

        .btn-outline-green:hover {
            color: var(--green-dark);
            background: var(--green-light);
            border-color: var(--green);
        }

        .profile-trigger {
            max-width: 230px;
            padding: 5px 10px 5px 6px;
            color: var(--text);
            background: white;
            border: 1px solid var(--border);
            border-radius: 30px;
        }

        .profile-trigger:hover {
            background: var(--green-soft);
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 50%;
        }

        .avatar-fallback {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: var(--green);
            font-size: 19px;
        }

        .profile-name {
            overflow: hidden;
            max-width: 125px;
            font-size: 13px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dropdown-menu {
            min-width: 220px;
            padding: 8px;
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .dropdown-item {
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .dropdown-item:hover {
            background: var(--green-light);
        }

        /* Hero */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 76px 0 65px;
            background:
                radial-gradient(ellipse at 8% 10%, rgba(91, 153, 111, .12), transparent 35%),
                radial-gradient(ellipse at 92% 55%, rgba(91, 153, 111, .10), transparent 32%),
                linear-gradient(180deg, #f4faf6 0%, #fff 100%);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 23px;
            padding: 9px 15px;
            color: var(--green);
            background: #e4f1e8;
            border: 1px solid #d6e8dc;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .2px;
        }

        .hero h1 {
            max-width: 850px;
            margin: 0 auto 20px;
            font-size: clamp(38px, 5.4vw, 66px);
            font-weight: 850;
            line-height: 1.1;
            letter-spacing: -2.6px;
        }

        .hero h1 span {
            color: var(--green);
        }

        .hero-description {
            max-width: 640px;
            margin: 0 auto 32px;
            color: var(--muted);
            font-size: 16px;
            line-height: 1.85;
        }

        /* Job search */

        .search-panel {
            max-width: 970px;
            margin: 0 auto;
            padding: 10px;
            background: white;
            border: 1px solid #dce7df;
            border-radius: 16px;
            box-shadow: 0 18px 50px rgba(22, 62, 43, .10);
        }

        .search-field {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 64px;
            padding: 8px 17px;
        }

        .search-field > i {
            color: var(--green);
            font-size: 21px;
        }

        .search-field label {
            display: block;
            margin-bottom: 2px;
            color: #44554a;
            font-size: 12px;
            font-weight: 800;
        }

        .search-field input {
            width: 100%;
            min-width: 0;
            padding: 3px 0;
            color: var(--text);
            background: transparent;
            border: 0;
            outline: 0;
            font-size: 14px;
        }

        .search-field input::placeholder {
            color: #89948d;
        }

        .search-field input:focus {
            box-shadow: none;
        }

        .search-divider {
            border-right: 1px solid var(--border);
        }

        .search-button {
            width: 100%;
            min-height: 62px;
            font-size: 15px;
        }

        .popular-searches {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 22px;
        }

        .popular-label {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
        }

        .popular-search {
            padding: 7px 11px;
            color: #536359;
            background: rgba(255, 255, 255, .85);
            border: 1px solid #e0e9e2;
            border-radius: 30px;
            font-size: 12px;
            transition: .2s;
        }

        .popular-search:hover {
            color: var(--green);
            background: var(--green-light);
            border-color: #b7d0c0;
        }

        .hero-trust {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 22px;
            margin-top: 30px;
            color: #65746a;
            font-size: 12px;
        }

        .hero-trust i {
            margin-right: 5px;
            color: var(--green);
        }

        /* Common sections */

        .section {
            padding: 76px 0;
        }

        .section-soft {
            background: #f7faf8;
        }

        .section-heading {
            margin-bottom: 32px;
        }

        .section-eyebrow {
            display: inline-block;
            margin-bottom: 10px;
            color: var(--green);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .section-title {
            margin-bottom: 12px;
            font-size: clamp(27px, 3vw, 36px);
            font-weight: 850;
            letter-spacing: -1px;
        }

        .section-description {
            max-width: 650px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .section-heading.centered .section-description {
            margin-right: auto;
            margin-left: auto;
        }

        .section-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--green);
            font-size: 13px;
            font-weight: 800;
        }

        .section-link:hover {
            color: var(--green-dark);
        }

        /* Trending searches */

        .trending-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .trending-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 12px 15px;
            color: #35483b;
            background: white;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            transition: .2s ease;
        }

        .trending-link i {
            color: var(--green);
        }

        .trending-link:hover {
            color: var(--green);
            background: var(--green-light);
            border-color: #b5cebe;
            transform: translateY(-2px);
        }

        /* Categories */

        .category-card {
            display: block;
            height: 100%;
            padding: 23px 20px;
            color: var(--text);
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .category-card:hover {
            color: var(--text);
            border-color: #a9c6b4;
            box-shadow: var(--shadow);
            transform: translateY(-4px);
        }

        .category-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            margin-bottom: 18px;
            color: var(--green);
            background: var(--green-light);
            border-radius: 13px;
            font-size: 22px;
        }

        .category-card h3 {
            margin-bottom: 7px;
            font-size: 15px;
            font-weight: 800;
        }

        .category-card p {
            margin-bottom: 14px;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        .category-arrow {
            color: #819187;
            font-size: 14px;
            transition: transform .2s;
        }

        .category-card:hover .category-arrow {
            color: var(--green);
            transform: translateX(4px);
        }

        /* How it works */

        .how-card {
            height: 100%;
            padding: 28px 25px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            transition: .2s ease;
        }

        .how-card:hover {
            border-color: #bdd1c3;
            box-shadow: var(--shadow);
        }

        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            margin-bottom: 20px;
            color: var(--green);
            background: var(--green-light);
            border-radius: 13px;
            font-size: 19px;
            font-weight: 850;
        }

        .how-card h3 {
            margin-bottom: 10px;
            font-size: 17px;
            font-weight: 800;
        }

        .how-card p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        /* Recruiter banner */

        .recruiter-section {
            padding: 20px 0 76px;
        }

        .recruiter-banner {
            position: relative;
            overflow: hidden;
            padding: 48px;
            color: white;
            background: linear-gradient(120deg, #21604A 0%, #144432 100%);
            border-radius: 22px;
        }

        .recruiter-banner::after {
            position: absolute;
            top: -100px;
            right: 5%;
            width: 280px;
            height: 280px;
            content: "";
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            box-shadow: 0 0 0 35px rgba(255,255,255,.04),
                        0 0 0 70px rgba(255,255,255,.025);
            pointer-events: none;
        }

        .recruiter-content {
            position: relative;
            z-index: 1;
        }

        .recruiter-badge {
            display: inline-block;
            margin-bottom: 15px;
            padding: 7px 11px;
            color: #e0f2e6;
            background: rgba(255,255,255,.11);
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 30px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .recruiter-banner h2 {
            max-width: 620px;
            margin-bottom: 14px;
            font-size: clamp(27px, 3vw, 37px);
            font-weight: 850;
            letter-spacing: -.8px;
        }

        .recruiter-banner p {
            max-width: 620px;
            margin-bottom: 0;
            color: #d6e7dc;
            font-size: 14px;
            line-height: 1.85;
        }

        .btn-white {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 48px;
            padding: 12px 19px;
            color: var(--green-dark);
            background: white;
            border: 1px solid white;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 800;
            transition: .2s;
        }

        .btn-white:hover {
            color: var(--green-dark);
            background: #eaf4ee;
            transform: translateY(-2px);
        }

        /* Footer */

        .site-footer {
            padding: 40px 0 22px;
            background: #f8faf8;
            border-top: 1px solid var(--border);
        }

        .footer-brand {
            margin-bottom: 12px;
        }

        .footer-description {
            max-width: 340px;
            margin-bottom: 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .footer-heading {
            margin-bottom: 14px;
            color: var(--text);
            font-size: 13px;
            font-weight: 800;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 11px;
        }

        .footer-links a {
            color: var(--muted);
            font-size: 12px;
        }

        .footer-links a:hover {
            color: var(--green);
        }

        .footer-bottom {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 32px;
            padding-top: 20px;
            color: var(--muted);
            border-top: 1px solid var(--border);
            font-size: 12px;
        }

        .footer-bottom p {
            margin: 0;
        }

        /* Responsive */

        @media (max-width: 991px) {
            .navbar-collapse {
                padding-top: 14px;
            }

            .navbar-actions {
                align-items: stretch !important;
                padding-bottom: 12px;
            }

            .profile-trigger {
                width: fit-content;
            }

            .hero {
                padding: 60px 0 50px;
            }

            .section {
                padding: 58px 0;
            }

            .recruiter-banner {
                padding: 36px;
            }
        }

        @media (max-width: 767px) {
            .hero {
                padding: 46px 0 42px;
            }

            .hero h1 {
                letter-spacing: -1.5px;
            }

            .hero-description {
                font-size: 14px;
            }

            .search-panel {
                padding: 8px;
                border-radius: 13px;
            }

            .search-field {
                min-height: 60px;
                border-bottom: 1px solid var(--border);
            }

            .search-divider {
                border-right: 0;
            }

            .search-button {
                min-height: 52px;
            }

            .hero-trust {
                gap: 12px 18px;
            }

            .section {
                padding: 46px 0;
            }

            .section-heading {
                margin-bottom: 24px;
            }

            .category-card {
                padding: 19px 15px;
            }

            .recruiter-section {
                padding-bottom: 48px;
            }

            .recruiter-banner {
                padding: 30px 23px;
                border-radius: 17px;
            }

            .recruiter-banner::after {
                right: -150px;
            }

            .footer-links {
                margin-bottom: 8px;
            }
        }

        @media (max-width: 400px) {
            .navbar-brand {
                font-size: 22px;
            }

            .brand-icon {
                width: 34px;
                height: 34px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .popular-searches {
                gap: 6px;
            }

            .popular-search {
                padding: 6px 9px;
                font-size: 11px;
            }
        }
    </style>
</head>

<body>

{{-- Navigation --}}
<nav class="navbar navbar-expand-lg main-navbar py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="brand-icon">
                <i class="bi bi-briefcase-fill"></i>
            </span>
            JobBridge
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent"
                aria-controls="navbarContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="#trending">Find Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#recruiters">For Employers</a>
                </li>
            </ul>

            <div class="navbar-actions d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <div class="dropdown">
                        <button class="btn profile-trigger dropdown-toggle d-flex align-items-center gap-2"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">

                            @if (Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                     alt="Profile photo"
                                     class="profile-avatar">
                            @else
                                <span class="profile-avatar avatar-fallback">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                            @endif

                            <span class="profile-name">
                                {{ Auth::user()->first_name ?? 'My Account' }}
                            </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <span class="dropdown-item-text text-muted small text-break">
                                    {{ Auth::user()->email }}
                                </span>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item" href="{{ route('profile.show') }}">
                                    <i class="bi bi-person me-2"></i>My Profile
                                </a>
                            </li>

                            @if (Auth::user()->role === 'recruiter')
                                <li>
                                    <a class="dropdown-item" href="{{ route('recruiter.dashboard') }}">
                                        <i class="bi bi-speedometer2 me-2"></i>Recruiter Dashboard
                                    </a>
                                </li>
                            @endif

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-green">
                        Sign in
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-green">
                        Get started <i class="bi bi-arrow-right"></i>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main>
    {{-- Hero and job search --}}
    <section class="hero text-center">
        <div class="container hero-content">
            <div class="hero-label">
                <i class="bi bi-stars"></i>
                Your next opportunity starts here
            </div>

            <h1>
                Find work that moves
                <span>your future forward.</span>
            </h1>

            <p class="hero-description">
                Explore career opportunities, discover internships, and
                connect with employers who value your skills. Take your
                next career step with JobBridge.
            </p>

            <form action="{{ route('candidate.jobs.index') }}"
                  method="GET"
                  class="search-panel text-start">

                <div class="row g-0 align-items-center">
                    <div class="col-md-5 search-divider">
                        <div class="search-field">
                            <i class="bi bi-search"></i>
                            <div class="flex-grow-1">
                                <label for="jobQuery">What are you looking for?</label>
                                <input type="text"
                                       id="jobQuery"
                                       name="q"
                                       value="{{ request('q') }}"
                                       placeholder="Job title, skill or company"
                                       aria-label="Job title, skill or company">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="search-field">
                            <i class="bi bi-geo-alt"></i>
                            <div class="flex-grow-1">
                                <label for="jobLocation">Where?</label>
                                <input type="text"
                                       id="jobLocation"
                                       name="location"
                                       value="{{ request('location') }}"
                                       placeholder="City, state or remote"
                                       aria-label="Job location">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 p-1">
                        <button type="submit" class="btn btn-green search-button">
                            <i class="bi bi-search"></i>
                            Find jobs
                        </button>
                    </div>
                </div>
            </form>

            <div class="popular-searches">
                <span class="popular-label">Popular:</span>

                @foreach (['PHP Developer', 'Laravel Developer', 'Web Developer', 'Internship'] as $term)
                    <a class="popular-search"
                       href="{{ route('candidate.jobs.index', ['q' => $term]) }}">
                        {{ $term }}
                    </a>
                @endforeach
            </div>

            <div class="hero-trust">
                <span><i class="bi bi-check-circle-fill"></i>Easy job discovery</span>
                <span><i class="bi bi-person-check-fill"></i>Candidate profiles</span>
                <span><i class="bi bi-building-check"></i>Recruiter connections</span>
            </div>
        </div>
    </section>

    {{-- Trending searches --}}
    <section class="section" id="trending">
        <div class="container">
            <div class="section-heading d-flex flex-wrap align-items-end justify-content-between gap-3">
                <div>
                    <span class="section-eyebrow">Start exploring</span>
                    <h2 class="section-title">Popular job searches</h2>
                    <p class="section-description">
                        Explore popular roles or search for a position that matches your goals.
                    </p>
                </div>

                <a href="{{ route('candidate.jobs.index') }}" class="section-link">
                    Browse jobs <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            @php
                $trending = [
                    'PHP Developer',
                    'Web Developer',
                    'Software Developer',
                    'Laravel Developer',
                    'React Developer',
                    'Java Developer',
                    'Fresher Jobs',
                    'IT Internship',
                    'Work from home',
                    'Data Analyst',
                    'Customer Support',
                    'Digital Marketing',
                ];
            @endphp

            <div class="trending-list">
                @foreach ($trending as $term)
                    <a class="trending-link"
                       href="{{ route('candidate.jobs.index', ['q' => $term]) }}">
                        <i class="bi bi-search"></i>
                        {{ $term }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Job categories --}}
    <section class="section section-soft" id="categories">
        <div class="container">
            <div class="section-heading">
                <span class="section-eyebrow">Explore opportunities</span>
                <h2 class="section-title">Find jobs by category</h2>
                <p class="section-description">
                    Discover opportunities in fields that match your interests,
                    experience, and career plans.
                </p>
            </div>

            @php
                $categories = [
                    ['title' => 'Software & IT', 'description' => 'Development, testing and support', 'icon' => 'bi-code-slash', 'query' => 'Software Developer'],
                    ['title' => 'Marketing', 'description' => 'Digital marketing and sales', 'icon' => 'bi-megaphone', 'query' => 'Marketing'],
                    ['title' => 'Customer Support', 'description' => 'Customer service and support', 'icon' => 'bi-headset', 'query' => 'Customer Support'],
                    ['title' => 'Internships', 'description' => 'Start your professional journey', 'icon' => 'bi-mortarboard', 'query' => 'Internship'],
                    ['title' => 'Data & Analytics', 'description' => 'Analysis and reporting roles', 'icon' => 'bi-bar-chart-line', 'query' => 'Data Analyst'],
                    ['title' => 'Finance', 'description' => 'Accounts and finance careers', 'icon' => 'bi-cash-stack', 'query' => 'Finance'],
                    ['title' => 'Human Resources', 'description' => 'Recruitment and HR roles', 'icon' => 'bi-people', 'query' => 'Human Resources'],
                    ['title' => 'Remote Jobs', 'description' => 'Flexible work opportunities', 'icon' => 'bi-house-laptop', 'query' => 'Remote'],
                ];
            @endphp

            <div class="row g-3">
                @foreach ($categories as $category)
                    <div class="col-6 col-lg-3">
                        <a href="{{ route('candidate.jobs.index', ['q' => $category['query']]) }}"
                           class="category-card">
                            <div class="category-icon">
                                <i class="bi {{ $category['icon'] }}"></i>
                            </div>

                            <h3>{{ $category['title'] }}</h3>
                            <p>{{ $category['description'] }}</p>

                            <div class="text-end">
                                <i class="bi bi-arrow-right category-arrow"></i>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section class="section" id="how-it-works">
        <div class="container">
            <div class="section-heading centered text-center">
                <span class="section-eyebrow">Simple and straightforward</span>
                <h2 class="section-title">Your next career step</h2>
                <p class="section-description">
                    Get started with a simple process designed to connect
                    candidates and employers.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="how-card">
                        <div class="step-number">01</div>
                        <h3>Create your profile</h3>
                        <p>
                            Register on JobBridge and complete your profile
                            to prepare for job applications.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="how-card">
                        <div class="step-number">02</div>
                        <h3>Discover opportunities</h3>
                        <p>
                            Search job listings and explore positions that
                            suit your skills and career interests.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="how-card">
                        <div class="step-number">03</div>
                        <h3>Apply and connect</h3>
                        <p>
                            Submit your application and track your progress
                            through the opportunities available to you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Recruiter call to action --}}
    <section class="recruiter-section" id="recruiters">
        <div class="container">
            <div class="recruiter-banner">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8 recruiter-content">
                        <span class="recruiter-badge">
                            <i class="bi bi-buildings me-1"></i>
                            FOR EMPLOYERS
                        </span>

                        <h2>Find the right people for your team.</h2>

                        <p>
                            Join JobBridge as a recruiter, publish job
                            opportunities, and connect with candidates
                            ready to contribute their skills.
                        </p>
                    </div>

                    <div class="col-lg-4 recruiter-content text-lg-end">
                        <a href="{{ route('register') }}" class="btn-white">
                            <i class="bi bi-building-add"></i>
                            Join as a recruiter
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Footer --}}
<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5 col-md-6">
                <a class="navbar-brand footer-brand" href="{{ route('home') }}">
                    <span class="brand-icon">
                        <i class="bi bi-briefcase-fill"></i>
                    </span>
                    JobBridge
                </a>

                <p class="footer-description">
                    Connecting people with opportunities and helping
                    candidates take their next career step.
                </p>
            </div>

            <div class="col-6 col-lg-2 col-md-3">
                <h3 class="footer-heading">Candidates</h3>
                <div class="footer-links">
                    <a href="{{ route('candidate.jobs.index') }}">Find jobs</a>
                    <a href="#categories">Job categories</a>
                    <a href="{{ route('register') }}">Create account</a>
                </div>
            </div>

            <div class="col-6 col-lg-2 col-md-3">
                <h3 class="footer-heading">Employers</h3>
                <div class="footer-links">
                    <a href="#recruiters">For recruiters</a>
                    <a href="{{ route('register') }}">Join JobBridge</a>
                    @auth
                        @if (Auth::user()->role === 'recruiter')
                            <a href="{{ route('recruiter.dashboard') }}">Dashboard</a>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h3 class="footer-heading">Your account</h3>
                <div class="footer-links">
                    @auth
                        <a href="{{ route('profile.show') }}">My profile</a>
                    @else
                        <a href="{{ route('login') }}">Sign in</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                    <a href="#how-it-works">How it works</a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© {{ date('Y') }} JobBridge. All rights reserved.</p>
            <p>Built to connect talent with opportunity.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>