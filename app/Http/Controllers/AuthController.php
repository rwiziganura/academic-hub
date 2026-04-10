<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the registration form
     */
    public function showRegister()
    {
        return view('register', ['title' => 'Register']);
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        // Validate input - Laravel handles validation errors automatically
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Create user with hashed password
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log in the user
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Registration successful!');
    }

    /**
     * Show the login form
     */
    public function showLogin()
    {
        return view('login', ['title' => 'Login']);
    }

    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        // Validate input - Laravel handles validation errors automatically
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log in
        if (Auth::attempt($validated)) {
            // Regenerate session for security
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login successful!');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login')->with('success', 'You have been logged out.');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Logout failed.']);
        }
    }
}
