<?php

namespace App\Services;

use App\Contracts\Interfaces\AttendanceInterface;
use App\Contracts\Interfaces\AttendanceJournalInterface;
use App\Contracts\Interfaces\LessonHourInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Enums\AttendanceEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\StoreAttendanceJournalRequest;
use App\Http\Requests\UpdateAttendanceJournalRequest;
use App\Http\Requests\UpdateTeacherJournalRequest;
use App\Models\AttendanceJournal;
use App\Models\LessonHour;
use App\Models\LessonSchedule;
use App\Models\TeacherJournal;
use App\Traits\UploadTrait;
use Carbon\Carbon;

class AttendanceJournalService
{
    use UploadTrait;

    private AttendanceInterface $attendance;
    private AttendanceJournalInterface $attendanceJournal;
    private LessonScheduleInterface $lessonSchedule;
    private LessonHourInterface $lessonHour;

    public function __construct(AttendanceInterface $attendance, AttendanceJournalInterface $attendanceJournal, LessonScheduleInterface $lessonSchedule, LessonHourInterface $lessonHour)
    {
        $this->attendance = $attendance;
        $this->attendanceJournal = $attendanceJournal;
        $this->lessonSchedule = $lessonSchedule;
        $this->lessonHour = $lessonHour;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function storeJournal($attendance, TeacherJournal $teacherJournal): void
    {
        $lessonToday = LessonSchedule::where('day', strtolower(Carbon::today()->format('l')))->orderBy('created_at', 'desc')->get();
        $start = $lessonToday->sortBy('created_at')->first()->start->end;
        $end = $lessonToday->first()->start->end;

        $rules = $this->lessonSchedule->show($teacherJournal->lesson_schedule_id);
        $min = $this->lessonHour->whereBetween($rules->start->start, $rules->end->start, $rules->day);
        $totalHour = $this->lessonHour->whereBetween($start, $end, $rules->day);

        foreach ($attendance as $key => $value) {
            $data['teacher_journal_id'] = $teacherJournal->id;
            $data['classroom_student_id'] = $key;
            $data['status'] = $value == 'present' ? AttendanceEnum::PRESENT->value : ($value == 'permit' ? AttendanceEnum::PERMIT->value : ($value == 'sick' ? AttendanceEnum::SICK->value : ($value == 'alpha' ? AttendanceEnum::ALPHA->value : '')));
            $this->attendanceJournal->store($data);

            $rule = $this->attendance->getClassroomStudent($key);

            if ($rule && $value == 'alpha') {
                $this->attendance->update($rule->id, ['point' => $rule->point - 10 / $totalHour * $min]);
            }
        }
    }

    public function updateJournal($attendance, TeacherJournal $teacherJournal): void
    {
        $rules = $this->lessonSchedule->show($teacherJournal->lesson_schedule_id);
        $min = $this->lessonHour->whereBetween($rules->start->start, $rules->end->start, $rules->day);


        foreach ($attendance as $key => $value) {
            $attendanceJournal = $this->attendanceJournal->getByClassroomStudent($key);
            $rule = $this->attendance->getClassroomStudent($key);

            if ($attendanceJournal->status->value != $value) {
                if ($value == 'present') {
                    $data['status'] = $value == 'present' ? AttendanceEnum::PRESENT->value : ($value == 'permit' ? AttendanceEnum::PERMIT->value : ($value == 'sick' ? AttendanceEnum::SICK->value : ($value == 'alpha' ? AttendanceEnum::ALPHA->value : '')));
                    $this->attendanceJournal->updateByClassroomStudent($key, $data);

                    $this->attendance->update($rule->id, ['point' => $rule->point + $min]);
                } else {
                    $data['status'] = $value == 'present' ? AttendanceEnum::PRESENT->value : ($value == 'permit' ? AttendanceEnum::PERMIT->value : ($value == 'sick' ? AttendanceEnum::SICK->value : ($value == 'alpha' ? AttendanceEnum::ALPHA->value : '')));
                    $this->attendanceJournal->updateByClassroomStudent($key, $data);

                    if ($rule && $attendanceJournal->status->value == 'present') {
                        $this->attendance->update($rule->id, ['point' => $rule->point - $min]);
                    }
                }
            }
        }
    }

    public function store(StoreAttendanceJournalRequest $request)
    {
        $data = $request->validated();
        $attendance = $this->attendance->getStudent($data['student_id']);

        if ($data['status'] != AttendanceEnum::PRESENT->value) {
            $this->attendance->update($attendance->id, ['point' => $attendance->point - 1]);
        }

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
        }

        return $data;
    }

    public function update(AttendanceJournal $attendanceJournal, UpdateAttendanceJournalRequest $request)
    {
        $data = $request->validated();
        $attendance = $this->attendance->getStudent($data['student_id']);

        if ($data['status'] == AttendanceEnum::PRESENT->value) {
            $this->attendance->update($attendance->id, ['point' => $attendance->point + 1]);
        }

        if ($request->hasFile('proof') && $request->file('proof')->isValid()) {
            if ($attendanceJournal->proof == null) {
                $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
            } else {
                $this->remove($attendanceJournal->proof);
                $data['proof'] = $request->file('proof')->store(UploadDiskEnum::ATTENDANCE_JOURNAL->value, 'public');
            }
        } else {
            $data['proof'] = $attendanceJournal->proof;
        }

        return $data;
    }

    public function delete(AttendanceJournal $attendanceJournal)
    {
        if ($attendanceJournal->proof != null) {
            $this->remove($attendanceJournal->proof);
        }
    }
}
