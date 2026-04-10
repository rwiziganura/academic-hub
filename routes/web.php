<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student_controller;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected Routes (Authenticated Users)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    // Student Management Routes
    Route::get('/students/create_student', function () {
        return view('components.create_student', ['title' => 'Create Student']);
    });

    Route::get('/', [Student_controller::class, 'getAllStudents']);

    Route::get('/students/{id}', function ($id) {
        return view('edit', [
            'student' => Student::find($id),
            'title' => 'Edit Student',
        ]);
    });

    Route::post('/students', [Student_controller::class, 'createStudent']);

    Route::put('/students/{id}', [Student_controller::class, 'updateStudent']);

    Route::delete('/students/{id}', [Student_controller::class, 'deleteStudent']);
});



