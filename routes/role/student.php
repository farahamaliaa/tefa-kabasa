<?php

use App\Http\Controllers\Student\AttendanceController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\Student\FeedbackController;
use App\Http\Controllers\Student\RepairStudentController;
use App\Http\Controllers\Student\ViolationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('student')->name('student.')->group(function () {
    Route::get('', [DashboardStudentController::class, 'index'])->name('dashboard');

    Route::get('violations', [ViolationController::class, 'index'])->name('violations');
    Route::resource('repairs', RepairStudentController::class);
    Route::get('/class', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('feedback/{lessonSchedule}', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::put('feedback/update/{feedback}', [FeedbackController::class, 'update'])->name('feedback.update');
    Route::get('/all-feedback-schedule', [FeedbackController::class, 'show'])->name('feedback.show');
    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance');
});
