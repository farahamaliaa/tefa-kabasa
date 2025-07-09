<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Interfaces\ClassroomInterface;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolDetailController extends Controller
{
    private EmployeeInterface $employee;
    private ClassroomInterface $classroom;
    private ExtracurricularInterface $extracurricular;
    private StudentInterface $student;
    private ModelHasRfidInterface $modelHasRfid;
    private UserInterface $user;
    private SchoolYearInterface $schoolYear;

    public function __construct(EmployeeInterface $employee, ClassroomInterface $classroom, ExtracurricularInterface $extracurricular,
    StudentInterface $student, ModelHasRfidInterface $modelHasRfid, UserInterface $user, SchoolYearInterface $schoolYear)
    {
        $this->employee = $employee;
        $this->classroom = $classroom;
        $this->extracurricular = $extracurricular;
        $this->student = $student;
        $this->modelHasRfid = $modelHasRfid;
        $this->user = $user;
        $this->schoolYear = $schoolYear;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolyear = $this->schoolYear->active();

        return response()->json([
            'status' => true,
            'message' => "Berhasil mengambil data",
            'code' => 200,
            'data' => [
                'teacher' => $this->employee->getCountEmployee(RoleEnum::TEACHER->value),
                'classroom' => $this->classroom->countClass(),
                'extracurricular' => $this->extracurricular->count(),
                'student' => $this->student->count(),
                'rfid' => $this->modelHasRfid->count(),
                'school_year' => $schoolyear->school_year,
            ]
        ]);
    }
}
