<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->merge([
            'first_name' => trim((string) $request->input('first_name')),
            'middle_name' => trim((string) $request->input('middle_name')),
            'last_name' => trim((string) $request->input('last_name')),
            'email' => strtolower(trim((string) $request->input('email'))),
            'phone' => trim((string) $request->input('phone')),
            
        ]);

        $validated = $request->validate([
            'first_name' => [
                'required', 'string', 'min:2', 'max:50',
                'regex:/^[\pL\s\'-]+$/u',
            ],
            'middle_name' => [
                'nullable', 'string', 'max:50',
                'regex:/^[\pL\s\'-]*$/u',
            ],
            'last_name' => [
                'required', 'string', 'min:2', 'max:50',
                'regex:/^[\pL\s\'-]+$/u',
            ],
            'dob' => ['required', 'date', 'before_or_equal:today'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email'),
            ],
            'phone' => [
                'required', 'regex:/^\+?[0-9]{10,15}$/',
            ],
            'password' => [
                'required', 'confirmed',
                Password::min(8)->letters()->numbers(),
            ],
            'gender' => ['required', 'in:male,female,other,prefer_not_to_say'],

            'role' => ['required', 'in:candidate,recruiter'],
            
            'profile_photo' => [
                'required', 'image', 'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $photoPath = $request->file('profile_photo')
            ->store('profile-photos', 'public');

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'] ?? '',
            'last_name' => $validated['last_name'],
            'dob' => $validated['dob'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => $validated['password'],
            'gender' => $validated['gender'],
            'profile_photo' => $photoPath,
            'role' => $validated['role']
        ]);

        // Log out the user if they were automatically logged in
Auth::logout();

// Redirect to the login page
return redirect()->route('login')
    ->with('success', 'Registration successful! Please log in.');
    }




}
