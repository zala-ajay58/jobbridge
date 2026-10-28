<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Display the logged-in user's profile
    public function show()
    {
        $user = auth()->user();

        return view('profile.show', compact('user'));
    }

    // Show the edit profile form
    public function edit()
    {
        $user = auth()->user();

        return view('profile.edit', compact('user'));
    }

    // Update the user's profile
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'first_name'  => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name'   => ['required', 'string', 'max:100'],
            'dob'         => ['nullable', 'date', 'before:today'],
            'phone'       => ['required', 'string', 'max:20'],
            'profile_photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        unset($validated['profile_photo']);

        if ($request->hasFile('profile_photo')) {
            // Remove the previous photo, if present
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $validated['profile_photo'] = $request
                ->file('profile_photo')
                ->store('profile-photos', 'public');
        }

        $user->fill($validated);
        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Your profile has been updated successfully.');
    
    
            }
    public function destroy(\Illuminate\Http\Request $request)
{
    $user = $request->user();

    // Delete profile photo, if it exists.
    if ($user->profile_photo) {
        \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($user->profile_photo);
    }

    // Delete resume, if it exists.
    if ($user->resume_path) {
        \Illuminate\Support\Facades\Storage::disk('public')
            ->delete($user->resume_path);
    }

    // Log out the user.
    \Illuminate\Support\Facades\Auth::logout();

    // Delete the user document from MongoDB.
    $user->delete();

    // Invalidate the session.
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()
        ->route('register')
        ->with('success', 'Your account has been deleted successfully.');
}
}
