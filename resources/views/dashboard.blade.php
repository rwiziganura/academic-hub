@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <!-- Show success message if user just logged in -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- Heading -->
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p style="color: #666; margin-top: 10px;">You are successfully logged in.</p>
    
    <!-- User information -->
    <div style="margin-top: 30px; padding: 20px; background-color: #f9f9f9; border-left: 4px solid #3498db;">
        <h3>Your Account Information</h3>
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Joined:</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
    </div>
    
    <!-- Quick links for authenticated users -->
    <div style="margin-top: 30px;">
        <a href="/students/create_student" style="display: inline-block; background-color: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; margin-right: 10px;">Create Student</a>
        <a href="/" style="display: inline-block; background-color: #95a5a6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">View Students</a>
    </div>
@endsection

