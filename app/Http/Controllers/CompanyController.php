<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display the company registration form.
     */
    public function create()
    {
        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        return view('recruiter.companies.create', compact('company'));
    }

    /**
     * Register a new company or save an existing company profile.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'company_name' => 'required|string|max:150',
            'company_description' => 'required|string|max:5000',
            'industry' => 'required|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'founded_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'website' => 'nullable|url|max:255',
            'company_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        if ($request->hasFile('company_logo')) {
            $newLogo = $request->file('company_logo')
                ->store('company-logos', 'public');

            $validated['company_logo'] = $newLogo;

            if ($company && $company->company_logo) {
                Storage::disk('public')->delete(
                    $company->company_logo
                );
            }
        }

        $validated['recruiter_id'] = (string) auth()->id();

        if ($company) {
            $company->update($validated);
        } else {
            Company::create($validated);
        }

        return redirect()
            ->route('recruiter.dashboard')
            ->with('success', 'Company profile saved successfully!');
    }

    /**
     * Display the existing company details for editing.
     */
    public function edit()
    {
        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        if (!$company) {
            return redirect()
                ->route('recruiter.company.create')
                ->with('error', 'Please register your company first.');
        }

        return view('recruiter.companies.edit', compact('company'));
    }

    /**
     * Update the existing company profile.
     */
    public function update(Request $request)
    {
        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        if (!$company) {
            return redirect()
                ->route('recruiter.company.create')
                ->with('error', 'Please register your company first.');
        }

        $validated = $request->validate([
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'company_name' => 'required|string|max:150',
            'company_description' => 'required|string|max:5000',
            'industry' => 'required|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'founded_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'website' => 'nullable|url|max:255',
            'company_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:25',
            'address' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'linkedin_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('company_logo')) {
            $oldLogo = $company->company_logo;

            $newLogo = $request->file('company_logo')
                ->store('company-logos', 'public');

            $validated['company_logo'] = $newLogo;

            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
        }

        $company->update($validated);

        return redirect()
            ->route('recruiter.dashboard')
            ->with('success', 'Company information updated successfully.');
    }

    /**
     * Delete the company profile and its logo.
     */
    public function destroy()
    {
        $company = Company::where(
            'recruiter_id',
            (string) auth()->id()
        )->first();

        if (!$company) {
            return redirect()
                ->route('recruiter.dashboard')
                ->with('error', 'Company not found.');
        }

        if ($company->company_logo) {
            Storage::disk('public')->delete(
                $company->company_logo
            );
        }

        $company->delete();

        return redirect()
            ->route('recruiter.dashboard')
            ->with('success', 'Company deleted successfully.');
    }
}
