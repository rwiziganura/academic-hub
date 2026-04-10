<!-- BEGINNER-FRIENDLY LARAVEL AUTHENTICATION GUIDE -->

=== HOW THE APPLICATION WORKS ===

1. LAYOUT FILE (resources/views/layout.blade.php)
   - This is the MAIN TEMPLATE - every page uses it
   - Contains: Navbar, Main content area, Footer
   - Uses @yield('content') to show different content on different pages
   - Uses @if(!Auth::check()) to check if user is logged in
   - If logged in: Shows "Welcome, {name}" and Logout button
   - If NOT logged in: Shows Login and Register links

2. VIEWS (register, login, dashboard)
   - Use @extends('layout') - This means "use the layout file as my main structure"
   - Use @section('title', 'Register') - This sets the page title
   - Use @section('content') ... @endsection - This is where the page content goes
   
3. AUTHENTICATION
   - Auth::check() - Returns TRUE if user is logged in, FALSE if not
   - Auth::user()->name - Gets the logged-in user's name
   - Post /logout - Logout endpoint (must be POST for security)
   - @csrf - Security token (prevents attacks)

4. ERROR MESSAGES
   - @error('fieldname') - Shows validation error for a field
   - Errors come from the AuthController validation
   - {{ $message }} - The actual error text

=== FLOW ===

User visits /register
  ↓
AuthController->showRegister() returns register view
  ↓
register.blade.php extends layout.blade.php
  ↓
Layout shows navbar + form + footer
  ↓
User fills form and clicks Register
  ↓
AuthController->register() validates and creates user
  ↓
Redirects to /dashboard
  ↓
dashboard.blade.php shows (now User IS logged in, so navbar shows Welcome message)

=== KEY CONCEPTS FOR BEGINNERS ===

@extends('layout')        - "Use this file as my template"
@section('title', 'xxx')  - Set page title
@section('content') ... @endsection - Add page content
@yield('content')         - In layout: "Put the content section here"
@if()/@else/@endif        - If/else statement in Blade
Auth::check()             - Is user logged in? (true/false)
Auth::user()              - Get logged-in user object
Auth::user()->name        - Get user's name
@csrf                     - Security token in forms
old('fieldname')          - Restore input value if validation failed
@error('fieldname') ... @enderror - Show validation errors

=== INLINE CSS EXPLANATION ===

All the CSS is written directly in HTML using style="" attributes
This makes it easier for beginners to understand what's styled and why

Example:
<button style="background-color: #27ae60; color: white; padding: 12px;">
  This button = green background, white text, 12px padding

No external CSS file needed - everything is visible in the HTML!

=== FILES CREATED/UPDATED ===

1. layout.blade.php - Main template with navbar
2. dashboard.blade.php - User dashboard (shows after login)
3. register.blade.php - Registration form
4. login.blade.php - Login form
5. AuthController.php - Handles registration, login, logout
6. web.php - Routes configuration

All files use simple, easy-to-understand code with comments!
