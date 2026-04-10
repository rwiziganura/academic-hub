<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAuthentication extends Controller
{
    public function signupUser(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => ['required', 'email', 'unique:users,email'], 
                'name' => 'required|min:3|max:30',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
            ]);

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            Auth::login($user);

            return redirect('/')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Registration failed. Please try again.'])->withInput();
        }
    }

    public function loginUser(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($data)) {
                $request->session()->regenerate();
                return redirect('/')->with('success', 'Login successful!');
            }

            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Login failed. Please try again.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/login');
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Logout failed.']);
        }
    }
}
  