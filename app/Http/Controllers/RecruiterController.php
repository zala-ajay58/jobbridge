<?php

namespace App\Http\Controllers;

use App\Models\Company;

class RecruiterController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        return view('recruiter.dashboard', compact(
            'user',
            'company'
        ));
    }
}