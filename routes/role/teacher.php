<?php

use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\DashboardTeacherController;
use App\Http\Controllers\Teacher\StudentFeedbackController;
use App\Http\Controllers\Teacher\TeacherJournalController;
use App\Http\Controllers\Teacher\TeacherStudentController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('', [DashboardTeacherController::class, 'index'])->name('dashboard');

    // extracurricular
    Route::get('extracurricular', function () {
        return view('teacher.pages.ekstrakulikuler.index');
    })->name('extracurricular.index');

    Route::resource('journals', TeacherJournalController::class)->except(['create', 'store', 'update', 'edit']);
    Route::get('journals/update/{teacherJournal}', [TeacherJournalController::class, 'edit'])->name('journals.edit');
    Route::put('journals/update/{teacherJournal}', [TeacherJournalController::class, 'update'])->name('journals.update');

    Route::get('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'create'])->name('journals.create');
    Route::post('journals/create/{lessonSchedule}', [TeacherJournalController::class, 'store'])->name('journals.store');
    Route::resource('list-student-class', TeacherStudentController::class);

    Route::get('student-feedback', [StudentFeedbackController::class, 'index'])->name('student-feedback.index');

    Route::get('attendance/history', [AttendanceController::class, 'index'])->name('attendance.history');
});



