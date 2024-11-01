<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AttendanceController;

// Students Routes
Route::get('/students', [StudentController::class, 'index']);            // Get all students
Route::post('/students', [StudentController::class, 'store']);           // Create a new student
Route::get('/students/{id}', [StudentController::class, 'show']);        // Get a specific student
Route::put('/students/{id}', [StudentController::class, 'update']);      // Update a specific student
Route::delete('/students/{id}', [StudentController::class, 'destroy']);  // Delete a specific student

// Classes Routes
Route::get('/classes', [ClassController::class, 'index']);               // Get all classes
Route::post('/classes', [ClassController::class, 'store']);              // Create a new class
Route::get('/classes/{id}', [ClassController::class, 'show']);           // Get a specific class
Route::put('/classes/{id}', [ClassController::class, 'update']);         // Update a specific class
Route::delete('/classes/{id}', [ClassController::class, 'destroy']);     // Delete a specific class
Route::get('/classes/{id}/students', [ClassController::class, 'students']); // List students in a specific class

// Attendance Routes
Route::get('/attendances', [AttendanceController::class, 'index']);      // Get all attendance records
Route::post('/attendances', [AttendanceController::class, 'store']);     // Add an attendance record
Route::get('/attendances/{id}', [AttendanceController::class, 'show']);  // Get a specific attendance record
Route::put('/attendances/{id}', [AttendanceController::class, 'update']); // Update an attendance record
Route::delete('/attendances/{id}', [AttendanceController::class, 'destroy']); // Delete an attendance record
