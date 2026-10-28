<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RecruiterJobController;
use App\Http\Controllers\CandidateJobController;
use App\Http\Controllers\RecruiterApplicationController;
use App\Http\Controllers\Auth\PasswordResetController;

// Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Login and Registration
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.store');

    Route::get('/register', [RegistrationController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegistrationController::class, 'store'])
        ->name('register.store');
});

// Recruiter routes
Route::middleware(['auth', 'recruiter'])
    ->prefix('recruiter')
    ->name('recruiter.')
    ->group(function () {
        Route::get('/dashboard', [RecruiterController::class, 'dashboard'])
            ->name('dashboard');

        Route::get('/company/edit', [CompanyController::class, 'edit'])
    ->name('company.edit');

Route::put('/company/update', [CompanyController::class, 'update'])
    ->name('company.update');

    Route::delete('/company', [CompanyController::class, 'destroy'])
    ->name('company.destroy');

        Route::get('/company/create', [CompanyController::class, 'create'])
            ->name('company.create');

        Route::post('/company', [CompanyController::class, 'store'])
            ->name('company.store');

        Route::delete('/company', [CompanyController::class, 'destroy'])
            ->name('company.destroy');

        
        Route::get('/jobs/create', [JobController::class, 'create'])
         ->name('jobs.create');

        Route::post('/jobs', [JobController::class, 'store'])
         ->name('jobs.store');

         Route::get('/jobs', [RecruiterJobController::class, 'index'])
    ->name('jobs.index');

Route::get('/jobs/{id}/edit', [RecruiterJobController::class, 'edit'])
    ->name('jobs.edit');

Route::put('/jobs/{id}', [RecruiterJobController::class, 'update'])
    ->name('jobs.update');

Route::patch('/jobs/{id}/close', [RecruiterJobController::class, 'close'])
    ->name('jobs.close');

    
Route::get('/applications', [
    RecruiterApplicationController::class,
    'index'
])->name('applications.index');

Route::patch('/applications/{id}/status', [
    RecruiterApplicationController::class,
    'updateStatus'
])->name('applications.status');

Route::get('/applications/{id}/resume', [
    RecruiterApplicationController::class,
    'downloadResume'
])->name('applications.resume');


    });

Route::middleware('auth')
    ->prefix('candidate')
    ->name('candidate.')
    ->group(function () {
        Route::get('/jobs', [CandidateJobController::class, 'index'])
            ->name('jobs.index');

        Route::get('/jobs/{id}', [CandidateJobController::class, 'show'])
            ->name('jobs.show');

        // Display the application form
    Route::get('/jobs/{id}/apply', [CandidateJobController::class, 'applyForm'])
        ->name('jobs.apply');

    // Save the candidate's application
    Route::post('/jobs/{id}/apply', [CandidateJobController::class, 'storeApplication'])
        ->name('jobs.apply.store');
    });

    Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [
        PasswordResetController::class,
        'showVerifyForm'
    ])->name('password.reset.verify');

    Route::post('/forgot-password/verify', [
        PasswordResetController::class,
        'verify'
    ])->name('password.reset.verify.submit');

    Route::get('/reset-password', [
        PasswordResetController::class,
        'showChangeForm'
    ])->name('password.reset.change');

    Route::post('/reset-password', [
        PasswordResetController::class,
        'update'
    ])->name('password.reset.update');
});

Route::get('/candidate/applications', [
    CandidateJobController::class,
    'myApplications'
])->name('candidate.applications.index');

Route::delete('/candidate/applications/{id}', [
    CandidateJobController::class,
    'cancelApplication'
])->name('candidate.applications.destroy');

Route::patch('/recruiter/jobs/{id}/reopen', [
    JobController::class,
    'reopen'
])->name('recruiter.jobs.reopen');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
