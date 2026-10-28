<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    // Display email and date-of-birth verification form
    public function showVerifyForm()
    {
        return view('auth.password-reset.verify');
    }

    // Verify registered email and date of birth
    public function verify(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'dob' => ['required', 'date_format:Y-m-d'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        $dobMatches = false;

        if ($user && $user->dob) {
            $dobMatches = Carbon::parse($user->dob)->toDateString()
                === $validated['dob'];
        }

        if (!$user || !$dobMatches) {
            return back()
                ->withErrors([
                    'email' => 'Email or date of birth does not match our records.',
                ])
                ->withInput(['email' => $validated['email']]);
        }

        // Store the verified account ID in the server-side session
        $request->session()->put(
            'password_reset_user_id',
            (string) $user->getKey()
        );

        return redirect()->route('password.reset.change');
    }

    // Display new password form
    public function showChangeForm(Request $request)
    {
        if (!$request->session()->has('password_reset_user_id')) {
            return redirect()->route('password.reset.verify');
        }

        return view('auth.password-reset.change');
    }

    // Save the new password
    public function update(Request $request)
    {
        $userId = $request->session()->get('password_reset_user_id');

        if (!$userId) {
            return redirect()->route('password.reset.verify')
                ->withErrors([
                    'email' => 'Please verify your email and date of birth first.',
                ]);
        }

        $user = User::find($userId);

        if (!$user) {
            $request->session()->forget('password_reset_user_id');

            return redirect()->route('password.reset.verify');
        }

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($validated['password']);
        $user->save();

        // Remove reset permission after a successful password change
        $request->session()->forget('password_reset_user_id');

        return redirect()->route('login')->with(
            'password_reset_success',
            'Your password has been changed successfully. Please log in with your new password.'
        );
    }
}
