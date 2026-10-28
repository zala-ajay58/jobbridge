<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors([
                    'email' => 'Invalid email or password. Please try again.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->role === 'recruiter') {
            return redirect()
                ->route('recruiter.dashboard')
                ->with('success', 'Welcome to your recruiter dashboard!');
        }

        return redirect()
            ->intended(route('home'))
            ->with('success', 'Welcome back to JobBridge!');
    }

    public function login(Request $request)
    {
        // Keep compatibility if your login route uses this method.
        return $this->store($request);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have logged out successfully.');
    }
}
