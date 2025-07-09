<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\LessonScheduleInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Exports\TeacherJournalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class JournalTeacherController extends Controller
{
    private LessonScheduleInterface $lessonSchedule;
    private ClassroomInterface $classroom;
    private SubjectInterface $subject;

    public function __construct(LessonScheduleInterface $lessonSchedule, ClassroomInterface $classroom, SubjectInterface $subject)
    {
        $this->lessonSchedule = $lessonSchedule;
        $this->classroom = $classroom;
        $this->subject = $subject;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $all_journals = $this->lessonSchedule->whereJournalTeacher('all', $request);
        $fill_journals = $this->lessonSchedule->whereJournalTeacher('fill', $request);
        $notfill_journals = $this->lessonSchedule->whereJournalTeacher('notfill', $request);
        return view('school.pages.journals.index', compact('all_journals', 'fill_journals', 'notfill_journals'));
    }

    public function export_preview(Request $request)
    {
        $journals = $this->lessonSchedule->export($request);
        $classrooms = $this->classroom->whereInSchoolYears($request);
        $subjects = $this->subject->get();
        return view('school.pages.journals.export', compact('journals', 'classrooms', 'subjects'));
    }

    public function export(Request $request)
    {
        return Excel::download(new TeacherJournalExport($this->lessonSchedule, $request), 'Jurnal-Guru.xlsx');
    }
}
