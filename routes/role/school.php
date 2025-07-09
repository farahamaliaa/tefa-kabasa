<?php

use App\Exports\JadwalPelajaranExportNew;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceMasterController;
use App\Http\Controllers\AttendanceRuleController;
use App\Http\Controllers\AttendanceStudentController;
use App\Http\Controllers\AttendanceTeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ClassroomStudentController;
use App\Http\Controllers\EmployeeJournalController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ExtracurricularStudentController;
use App\Http\Controllers\Imports\ImportController;
use App\Http\Controllers\LessonHourController;
use App\Http\Controllers\LessonScheduleController;
use App\Http\Controllers\LevelClassController;
use App\Http\Controllers\MapleController;
use App\Http\Controllers\MaxLateController;
use App\Http\Controllers\ModelHasRfidController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolDashboardController;
use App\Http\Controllers\SchoolPointController;
use App\Http\Controllers\Schools\AttendanceController as SchoolsAttendanceController;
use App\Http\Controllers\Schools\AttendanceEmployeeController;
use App\Http\Controllers\Schools\AttendanceStudentController as SchoolsAttendanceStudentController;
use App\Http\Controllers\Schools\EmployeeController;
use App\Http\Controllers\Schools\ExtracurricularController as SchoolsExtracurricularController;
use App\Http\Controllers\Schools\GuestBookController;
use App\Http\Controllers\Schools\JournalTeacherController;
use App\Http\Controllers\Schools\PermissionController;
use App\Http\Controllers\Schools\SchoolFeedbackController;
use App\Http\Controllers\Schools\StaffController;
use App\Http\Controllers\Schools\StudentController;
use App\Http\Controllers\Schools\TeacherController;
use App\Http\Controllers\Schools\ViolationAccessController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherSubjectController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::middleware(['auth', 'role:school'])->prefix('school')->name('school.')->group(function () {
    Route::get('', [SchoolDashboardController::class, 'index'])->name('index');

    // setting informasi
    Route::prefix('information')->group(function () {
        Route::get('', [SchoolDashboardController::class, 'show'])->name('settings-information.index');
        Route::post('add-masterKey', [ModelHasRfidController::class, 'storeMaster'])->name('master-key.store');
        Route::get('edit', [SchoolDashboardController::class, 'edit'])->name('settings-information.edit');
        Route::put('update/{school}', [SchoolController::class, 'update'])->name('settings-information.update');
    });

    Route::get('max-late', [MaxLateController::class, 'index'])->name('max-late.index');
    Route::patch('max-late/{maxLate}', [MaxLateController::class, 'update'])->name('max-late.update');

    Route::get('clock-settings', [AttendanceRuleController::class, 'setting'])->name('clock-settings.index');    Route::get('get-clock-settings', [AttendanceRuleController::class, 'index'])->name('clock-settings.get');
    Route::post('add-clock-settings/{day}/{role}', [AttendanceRuleController::class, 'store'])->name('clock-settings.store');

    Route::post('school-points', [SchoolPointController::class, 'store'])->name('school-points.store');
    Route::get('journals', [JournalTeacherController::class, 'index'])->name('journals.detail');
    Route::get('export-journal', [JournalTeacherController::class, 'export_preview'])->name('export-journal.index');
    Route::get('export-journal/export', [JournalTeacherController::class, 'export'])->name('export-journal.export');
    Route::patch('max-point/{schoolPoint}', [SchoolPointController::class, 'update'])->name('max-point.update');
    Route::resource('violation', RegulationController::class);
    Route::get('violation-download', [RegulationController::class, 'download'])->name('violation.download');
    Route::post('violation-import', [RegulationController::class, 'import'])->name('violation.import');

    Route::resource('employees', EmployeeController::class);

    // cud and import teacher
    Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher/{slug}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::put('teacher/{employee}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('teacher/{employee}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::post('import-teacher/', [TeacherController::class, 'import'])->name('teacher.import');
    Route::get('download-template-teacher/', [TeacherController::class, 'downloadTemplate'])->name('teacher.download-template');

    Route::get('access-violation', [ViolationAccessController::class, 'index'])->name('access-violation.index');
    Route::post('account-acceess', [ViolationAccessController::class, 'store'])->name('account-access-violation');
    Route::delete('delete-account-acceess/{user}', [ViolationAccessController::class, 'destroy'])->name('delete-access.violation');

    //TeacherSubject
    Route::post('teacher-subject/{employee}', [TeacherSubjectController::class, 'store'])->name('teacher-subject.store');
    Route::delete('delete-teacher-subject/{teacherSubject}', [TeacherSubjectController::class, 'destroy'])->name('teacher-subject.destroy');

    // cud and import staff
    Route::post('staff', [StaffController::class, 'store'])->name('staff.store');
    Route::put('staff/{employee}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('staff/{employee}', [StaffController::class, 'destroy'])->name('staff.destroy');
    Route::post('import-staff/', [StaffController::class, 'import'])->name('staff.import');
    Route::get('download-template-staff/', [StaffController::class, 'downloadTemplate'])->name('staff.download-template');

    //import student
    Route::post('import-student/{classroom}', [StudentController::class, 'import'])->name('student.import');
    Route::get('download-template-student/', [StudentController::class, 'downloadTemplate'])->name('student.download-template');
    Route::get('download-template-class-student', [StudentController::class, 'downloadTemplateClass2'])->name('class.download.template');
    Route::resource('students', StudentController::class)->except(['store']);
    Route::post('students/{classroom}', [StudentController::class, 'store'])->name('students.store');

    Route::resource('subject', SubjectController::class);
    Route::resource('school-years', SchoolYearController::class);
    Route::resource('lesson-hours', LessonHourController::class)->except(['store']);
    Route::post('lesson-hours/{day}', [LessonHourController::class, 'store'])->name('lesson-hours.store');
    Route::resource('extracurricular', SchoolsExtracurricularController::class);

    // siswa ekstrakurikuler
    Route::post('extracurricular-students/{extracurricular}', [ExtracurricularStudentController::class, 'store'])->name('extracurricular-students.store');
    Route::delete('extracurricular-students/{extracurricularStudent}', [ExtracurricularStudentController::class, 'destroy'])->name('extracurricular-students.destroy');
    // import siswa ekstrakurikuler
    Route::post('import-extracurricular-student/{extracurricular}', [ExtracurricularStudentController::class, 'import'])->name('extracurricular-students.import');
    Route::get('download-template-extracurricular-student/', [ExtracurricularStudentController::class, 'downloadTemplate'])->name('extracurricular-students.download-template');

    Route::resource('classroom', ClassroomController::class);
    Route::resource('level-class', LevelClassController::class);
    Route::get('class-detail/{classroom}', [ClassroomStudentController::class, 'index'])->name('class-student.index');
    Route::get('class-detail/{classroom}/wheredosenthaveclassroom', [ClassroomStudentController::class, 'whereDosentHaveClassroom'])->name('class-student.doesntHaveClassroom');
    Route::put('update-classroom/{classroom}', [ClassroomStudentController::class, 'update'])->name('student-classroom.update');
    Route::patch('school-years/{schoolYear}/active', [SchoolYearController::class, 'setActive'])->name('school-year.setActive');
    Route::post('import-class-student', [ClassroomStudentController::class, 'import'])->name('class.student.import');

    Route::prefix('semesters')->name('semesters.')->group(function () {
        Route::get('/', [SemesterController::class, 'index'])->name('index');
        Route::post('/', [SemesterController::class, 'store'])->name('store');
    });

    Route::post('feedback-active', [PermissionController::class, 'create_feedback'])->name('feedback.active');
    Route::delete('feedback-nonactive', [PermissionController::class, 'delete_feedback'])->name('feedback.nonactive');

    // kehadiran siswa
    Route::get('student-attendance', [SchoolsAttendanceController::class, 'class'])->name('student-attendance.index');
    Route::get('student-attendance/{classroom}', [SchoolsAttendanceController::class, 'student'])->name('student-attendance.show');
    Route::get('export/{classroom}', [SchoolsAttendanceController::class, 'expotStudent'])->name('attendance-student-export.show');
    Route::get('student-attendance/export/{classroom}', [SchoolsAttendanceController::class, 'export_student'])->name('student-attendance.export');

    Route::put('upload-proof/{attendance}', [SchoolsAttendanceController::class, 'proof'])->name('student.upload.proof');

    // kehadiran guru
    Route::get('teacher-attendance', [SchoolsAttendanceController::class, 'teacher'])->name('teacher-attendance.index');
    Route::get('teacher-attendance/export', [AttendanceEmployeeController::class, 'export'])->name('teacher-attendance.export');

    // get classroom students by classroom id
    Route::get('classroom-students', [ClassroomStudentController::class, 'show'])->name('classroom-students.show');

    Route::resource('lesson-schedule', LessonScheduleController::class)->except(['show', 'store']);
    Route::post('lesson-schedule/{classroom}/{day}', [LessonScheduleController::class, 'store'])->name('lesson-schedule.store');
    Route::get('lesson-schedule/detail/{classroom}', [LessonScheduleController::class, 'show'])->name('lesson-schedule.detail');
    Route::get('lesson-schedule/export/{classroom}', [LessonScheduleController::class, 'export_pdf'])->name('lesson-schedule.export');
    Route::post('lesson-schedule/import', [LessonScheduleController::class, 'import'])->name('lesson-schedule.import');

    Route::get('/download-template-schedule', function () {
        // return (new InvoicesExport)->download('data.xlsx');
        return Excel::download(new JadwalPelajaranExportNew, 'template_jadwal_pelajaran.xlsx');
    })->name('classroom.template.schedule');

    Route::post('importSpreadsheet', [ImportController::class, 'importSpreadsheet'])->name('import-spreadsheet');

    // get teacher subject by subject id
    Route::get('teacher-subject/{subject}', [TeacherSubjectController::class, 'show'])->name('teacher-subject.show');
    Route::get('export/attendance-employee', [AttendanceEmployeeController::class, 'export'])->name('export.attendance.employee');

    Route::get('guest-book', [GuestBookController::class, 'index'])->name('guest-book.index');
    Route::get('journal-staff', [EmployeeJournalController::class, 'show'])->name('employee-journal.show');
    Route::get('export-journal-staff', [EmployeeJournalController::class, 'export'])->name('employee-journal.export');
    Route::get('export-journal-staff/download', [EmployeeJournalController::class, 'downloadJournal'])->name('employee-journal.download');
    Route::get('journal-staff/export', [EmployeeJournalController::class, 'download_journal'])->name('export-journal-staff.export');

    // alumni
    Route::get('class-alumni', [ClassroomController::class, 'classroomAlumni'])->name('class-alumni.index');
    Route::get('alumni/{classroom}', [ClassroomController::class, 'studentAlumni'])->name('alumni.index');

    // rfid
    Route::resource('rfid', RfidController::class)->except(['index', 'create', 'show', 'edit']);
    Route::get('rfid-school', [ModelHasRfidController::class, 'index'])->name('rfid-school.index');
    Route::post('rfid-school', [ModelHasRfidController::class, 'store'])->name('rfid-school.store');
    Route::delete('rfid-school/{modelHasRfid}', [ModelHasRfidController::class, 'destroy'])->name('rfid-school.delete');
    Route::get('rfid-active', [ModelHasRfidController::class, 'showActive'])->name('rfid-active.index');
    //rfid for student and employee
    Route::put('add-to-rfid/{role}/{id}', [ModelHasRfidController::class, 'update'])->name('add-to-rfid.update');

    //statistic presence
    Route::get('statistic-presence', [SchoolsAttendanceStudentController::class, 'index'])->name('statistic-presence.index');
    Route::get('statistic-presence-employee', [AttendanceEmployeeController::class, 'index'])->name('statistic-presence-employee.index');
    Route::get('detail-presence-class/{classroom}', [SchoolsAttendanceStudentController::class, 'show'])->name('detail-presence-class.index');
    Route::get('detail-presence-class/{classroom}/export', [SchoolsAttendanceStudentController::class, 'exportPreview'])->name('detail-presence-class.export-preview');

    Route::get('student-feedback', [SchoolFeedbackController::class, 'index'])->name('feedback');

    Route::get('student-feedback/detail/{teacher}', [SchoolFeedbackController::class, 'show'])->name('feedback.detail');
});

//tes absensi
Route::post('attendance-create/{school_id}', [AttendanceStudentController::class, 'store'])->name('attendance.store');

Route::get('menu-test', function () {
    return view('school.pages.test.menu');
})->name('menu-test.index');

// Route::get('user-list', function () {
//     return view('school.pages.test.user-list');
// })->name('user-list.index');

// list absensi
Route::get('list-attendance', [AttendanceStudentController::class, 'index'])->name('list-attendance.index');
Route::post('add-teacher-list-attendance', [AttendanceTeacherController::class, 'store'])->name('add-teacher-list-attendance.index');

// list absensi guru
Route::get('list-attendance-teacher', [AttendanceTeacherController::class, 'index'])->name('list-attendance-teacher.index');
Route::get('attendance-test', [AttendanceMasterController::class, 'index'])->name('attendance-test.index');
Route::get('attendance-test-teacher', [AttendanceMasterController::class, 'index_teacher'])->name('attendance-test-teacher.index');
Route::post('attendance-test-teacher', [AttendanceMasterController::class, 'check_teacher'])->name('attendance-test-teacher.check');
