<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceRuleInterface;
use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\FeedbackInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClassroomStudentResource;
use App\Http\Resources\FeedbackResource;
use App\Http\Resources\HistoryAttendanceResource;
use App\Http\Resources\HistoryJournalResource;
use App\Http\Resources\LessonScheduleResource;
use App\Http\Resources\TeacherSubjectResource;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class TeacherApiController extends Controller
{
    private EmployeeInterface $employee;
    private ClassroomInterface $classroom;
    private AttendanceInterface $attendance;
    private LessonScheduleInterface $lessonSchedule;
    private TeacherJournalInterface $teacherJournal;
    private TeacherSubjectInterface $teacherSubject;
    private FeedbackInterface $feedback;
    private ModelHasRfidInterface $modelHasRfid;
    private AttendanceRuleInterface $attendanceRule;

    public function __construct(
        EmployeeInterface $employee,
        ClassroomInterface $classroom,
        AttendanceInterface $attendance,
        LessonScheduleInterface $lessonSchedule,
        TeacherJournalInterface $teacherJournal,
        TeacherSubjectInterface $teacherSubject,
        FeedbackInterface $feedback,
        ModelHasRfidInterface $modelHasRfid,
        AttendanceRuleInterface $attendanceRule,
    )
    {
        $this->employee = $employee;
        $this->classroom = $classroom;
        $this->attendance = $attendance;
        $this->lessonSchedule = $lessonSchedule;
        $this->teacherJournal = $teacherJournal;
        $this->teacherSubject = $teacherSubject;
        $this->feedback = $feedback;
        $this->modelHasRfid = $modelHasRfid;
        $this->attendanceRule = $attendanceRule;
    }

    public function class(User $user)
    {
        $employee = $this->employee->getByUser($user->id);
        $classroom = $this->classroom->whereEmployeeId($employee->id);

        if ($classroom) {
            return response()->json(['status' => 'success', 'message' => "Data Berhasil di Tambahkan", 'code' => 200,
            'data_dashboard' => [
                'class' => $classroom->name,
                'count_student' => $classroom->classroomStudents()->latest()->count(),
            ],
            'class_student' => ClassroomStudentResource::collection($classroom->classroomStudents()->latest()->get()),
        ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Anda tidak memiliki kelas", 'code' => 200,
            'data_dashboard' => [
                'class' => '',
                'count_student' => 0,
            ],
        ], 200);
        }
    }

    public function teacher_attendance(User $user)
    {
        $employee = $this->employee->getByUser($user->id);
        $history_attendance = $this->attendance->whereUser($employee->id, 'App\Models\Employee');
        $single_attendance = $this->attendance->userToday('App\Models\Employee', $employee->id);
        $rule_rfid = $this->modelHasRfid->first('App\Models\Employee', $employee->id);
        $rule_day = $this->attendanceRule->whereDayRole(today()->format('l'), 'teacher');

        if ($rule_rfid) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'attendance_now' => [
                    'day' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l') : now()->translatedFormat('l'),
                    'date' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('d') : now()->translatedFormat('d'),
                    'month' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('M') : now()->translatedFormat('M'),
                    'date_complate' => $single_attendance ? Carbon::parse($single_attendance->created_at)->translatedFormat('l, j F Y') : now()->translatedFormat('l, j F Y'),
                    'check_in' => $single_attendance ? ($single_attendance->checkin == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkin)->format('H:i')) : '-',
                    'check_out' => $single_attendance ? ($single_attendance->checkout == null ? '-' : \Carbon\Carbon::parse($single_attendance->checkout)->format('H:i')) : '-',
                    'status' => $single_attendance ? $single_attendance->status->label() : '',
                ],
                'attendance_history' => $history_attendance->count() > 0 ? HistoryAttendanceResource::collection($history_attendance) : 'Data Kosong',
            ], 200);
        } else if ($rule_day->is_holiday ==  true) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'attendance_now' => [
                    'day' => now()->translatedFormat('l'),
                    'date' => now()->translatedFormat('d'),
                    'month' => now()->translatedFormat('M'),
                    'date_complate' => now()->translatedFormat('l, j F Y'),
                    'check_in' => '-',
                    'check_out' => '-',
                    'status' => 'Libur',
                ],
                'attendance_history' => $history_attendance->count() > 0 ? HistoryAttendanceResource::collection($history_attendance) : 'Data Kosong',
            ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Data Kosong", 'code' => 200, 'message_attendance' => "Anda Belum memiliki RFID"], 200);
        }

    }

    public function today_lesson_schedule(User $user)
    {
        $teacherSchedules = $this->lessonSchedule->whereTeacher($user->id, today());

        if ($teacherSchedules->count() > 0) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'lesson_schedule_dashboard' => LessonScheduleResource::collection($teacherSchedules->take(5)),
                'lesson_schedule_all' => LessonScheduleResource::collection($teacherSchedules),
            ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Data kosong",'code' => 200], 200);
        }
    }

    public function today_history_journal(User $user)
    {
        $historyJournal = $this->teacherJournal->getJournalToday($user->id);
        if ($historyJournal->count() > 0) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'data' => HistoryJournalResource::collection($historyJournal),
            ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Data kosong",'code' => 200], 200);
        }
    }

    public function teacher_subject(User $user)
    {
        $employee = $this->employee->getByUser($user->id);
        $teacherSubject = $this->teacherSubject->getByTeacher($employee->id);

        if ($teacherSubject->count() > 0) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'data' => TeacherSubjectResource::collection($teacherSubject),
            ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 200], 200);
        }
    }

    public function get_feedback(TeacherSubject $teacherSubject)
    {
        $feedbacks = $this->feedback->getBySubject($teacherSubject->id);
        if ($feedbacks->count() > 0) {
            return response()->json(['status' => 'success', 'message' => "Berhasil mengambil data",'code' => 200,
                'data' => FeedbackResource::collection($feedbacks),
            ], 200);
        } else {
            return response()->json(['status' => 'success', 'message' => "Data Kosong",'code' => 200], 200);
        }
    }
}
