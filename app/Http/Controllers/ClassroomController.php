<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\LevelClassInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Enums\RoleEnum;
use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\ClassroomStudent;
use App\Models\LevelClass;
use App\Services\School\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    private ClassroomInterface $classroom;
    private LevelClassInterface $levelClass;
    private SchoolYearInterface $schoolYear;
    private EmployeeInterface $employee;
    private SchoolInterface $school;
    private StudentInterface $student;
    private ClassroomStudentInterface $classroomStudent;
    private ClassroomService $service;

    public function __construct(ClassroomService $service, ClassroomInterface $classroom, LevelClassInterface $levelClass, SchoolYearInterface $schoolYear, EmployeeInterface $employee, SchoolInterface $school, StudentInterface $student, ClassroomStudentInterface $classroomStudent)
    {
        $this->classroom = $classroom;
        $this->levelClass = $levelClass;
        $this->schoolYear = $schoolYear;
        $this->employee = $employee;
        $this->school = $school;
        $this->student = $student;
        $this->classroomStudent = $classroomStudent;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $classrooms = $this->classroom->search($request)->paginate(12);
        $levelClasses = $this->levelClass->search($request);
        $selectLevel = $this->levelClass->get();
        $teachers = $this->employee->getTeacher();
        $classLevel = $this->levelClass->get();

        return view('school.pages.class.index', compact('classrooms', 'levelClasses', 'teachers', 'classLevel', 'selectLevel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        try {
            $this->service->store($request);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Request $request)
    {
        $schoolYears = $this->schoolYear->search($request);
        $students = $this->student->doesntHaveClassroom($request);
        $classroomStudents = $this->classroomStudent->where($classroom->id, $request);
        return view('school.pages.class.detail-class', compact('classroom', 'schoolYears', 'students', 'classroomStudents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            $this->classroom->update($classroom->id, $request->validated());
            return redirect()->back()->with('success', 'Berhasil memperbarui kelas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $this->classroom->delete($classroom->id);
            return redirect()->back()->with('success', 'Berhasil menghapus kelas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function classroomAlumni(Request $request): mixed
    {
        $classrooms = $this->classroom->getAlumni($request);
        $schoolYears = $this->schoolYear->get();
        return view('school.pages.alumni.class', compact('classrooms', 'schoolYears'));
    }

    public function studentAlumni(Classroom $classroom, Request $request): mixed {
        $classrooms = $this->classroomStudent->where($classroom->id, $request);
        return view('school.pages.alumni.index', compact('classrooms'));
    }
}
