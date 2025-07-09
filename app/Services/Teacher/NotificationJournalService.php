<?php

namespace App\Services\Teacher;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\Teachers\TeacherJournalInterface;
use App\Contracts\Interfaces\TeacherSubjectInterface;

class NotificationJournalService
{
    private EmployeeInterface $employee;
    private TeacherJournalInterface $teacherJournal;
    private TeacherSubjectInterface $teacherSubject;

    private LessonScheduleInterface $lessonSchedule;

    public function __construct(EmployeeInterface $employee, TeacherJournalInterface $teacherJournal, TeacherSubjectInterface $teacherSubject, LessonScheduleInterface $lessonSchedule)
    {
        $this->employee = $employee;
        $this->teacherJournal = $teacherJournal;
        $this->teacherSubject = $teacherSubject;

        $this->lessonSchedule = $lessonSchedule;
    }

    public function notification()
    {
        $user = auth()->user();
        $day = now();
        $data = $this->lessonSchedule->whereTeacherNotif($user->id, $day);
        $notifications = [];

        foreach ($data as $item) {
            $notifications[] = 'Anda belum mengisi jurnal Guru pada '. $item->start->name;
        }

        return $notifications;
    }
}
