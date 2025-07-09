<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Api\RfidApiController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\Api\AttendanceRuleApiController;
use App\Http\Controllers\Api\LessonScheduleApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\SchoolDetailController;
use App\Http\Controllers\Api\StafApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\StudentFeedbackController;
use App\Http\Controllers\Api\TeacherApiController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\Schools\PermissionController;
use App\Models\ModelHasRfid;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('attendace/masterkey-check', [AttendanceMasterController::class, 'check'])->name('attendance-test.check');
Route::post('attendance/add', [AttendanceController::class, 'store'])->name('attendance.add');
Route::get('attendance/rfids', [RfidApiController::class, 'index'])->name('rfid.account');
Route::get('attendance/hours', [AttendanceRuleApiController::class, 'index'])->name('attendance.hour');
Route::get('attendance/list', [AttendanceController::class, 'listAttendance']);
Route::get('attendance/reset', [AttendanceController::class, 'reset']);
Route::get('school/detail', [SchoolDetailController::class, 'index']);
Route::get('student/classroom/{classroom}', [ClassroomStudentController::class, 'getByClasroom']);

Route::get('users-all', function () {
    $users = User::all();
    return response()->json($users);
});

Route::get('test-day-attendance', function () {
    $attendances = App\Models\Attendance::whereDay('created_at', now()->day)->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();

    $users = ModelHasRfid::all();
    return response()->json([
        'attendance-count' => count($attendances),
        'user-count' => count($users),
        'attendance' => $attendances,
        'users' => $users
    ]);
});



Route::get('/run-command', function () {
    // Menjalankan command
    \Illuminate\Support\Facades\Artisan::call('command:create-attendance');

    // Opsional: Menampilkan output dari command
    $output = \Illuminate\Support\Facades\Artisan::output();

    // Kembalikan response ke pengguna
    return response()->json([
        'status' => 'success',
        'output' => $output,
    ]);
});

Route::post('login', [LoginApiController::class, 'login']);
Route::get('user-detail/{user}', [LoginApiController::class, 'user_detail']);

Route::get('feedback-active', [PermissionController::class, 'is_active']);

Route::get('student/dashboard/{user}', [StudentApiController::class, 'index']);
Route::get('student/history-attendance/{user}', [StudentApiController::class, 'history_attendance']);
Route::get('student/lesson-schedule/{user}', [StudentApiController::class, 'lessonSchedule']);
Route::get('student/class-student/{user}', [StudentApiController::class, 'class_student']);
Route::get('student/point-student/{user}', [StudentApiController::class, 'point_student']);
Route::get('student/detail-profile/{user}', [StudentApiController::class, 'get_detail_profile']);
Route::get('student/violation/{user}', [StudentApiController::class, 'violation']);
Route::get('student/repair/{user}', [StudentApiController::class, 'repair']);
Route::post('student/feedback/{lessonSchedule}', [StudentFeedbackController::class, 'store'])->name('feedback.store');
Route::put('student/feedback/update/{feedback}', [StudentFeedbackController::class, 'update'])->name('feedback.update');

Route::post('staf/create-journal/{user}', [StafApiController::class, 'create_journal']);
Route::get('staf/dashboard/{user}', [StafApiController::class, 'index']);
Route::get('staf/history-journals/{user}', [StafApiController::class, 'history_journals']);
Route::get('staf/overview-header', [StafApiController::class, 'overview_header']);
Route::get('staf/max-point', [StafApiController::class, 'max_point']);
Route::get('staf/list-violation', [StafApiController::class, 'list_violation']);
Route::get('staf/list-repair', [StafApiController::class, 'list_repair']);
Route::get('staf/list-point-student', [StafApiController::class, 'list_point_student']);
Route::get('staf/popular-violations', [StafApiController::class, 'popular_violations']);
Route::get('staf/student-permissions', [StafApiController::class, 'student_permissions']);
Route::get('staf/statistic-violation', [StafApiController::class, 'statistic_violation']);

Route::get('teacher/class/{user}', [TeacherApiController::class, 'class']);
Route::get('teacher/attendance/{user}', [TeacherApiController::class, 'teacher_attendance']);
Route::get('teacher/lesson-schedule/{user}', [TeacherApiController::class, 'today_lesson_schedule']);
Route::get('teacher/history-journal/{user}', [TeacherApiController::class, 'today_history_journal']);
Route::get('teacher/subject/{user}', [TeacherApiController::class, 'teacher_subject']);
Route::get('teacher/get-feedback/{teacherSubject}', [TeacherApiController::class, 'get_feedback']);

Route::post('teacher/store-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'store']);

Route::get('teacher/detail-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'show']);
Route::put('teacher/update-journal/{lessonSchedule}', [LessonScheduleApiController::class, 'update']);
