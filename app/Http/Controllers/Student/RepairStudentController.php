<?php

namespace App\Http\Controllers\Student;

use App\Contracts\Interfaces\StudentRepairInterface;
use App\Http\Requests\RepairStudentRequest;
use App\Services\RepairStudentService;
use App\Http\Controllers\Controller;
use App\Models\StudentRepair;
use Illuminate\Http\Request;

class RepairStudentController extends Controller
{
    private StudentRepairInterface $studentRepair;
    private RepairStudentService $service;

    public function __construct(StudentRepairInterface $studentRepair, RepairStudentService $service)
    {
        $this->studentRepair = $studentRepair;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $repairs = $this->studentRepair->whereStudent(auth()->user()->student->id, $request);
        return view('student.pages.repair.index', compact('repairs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(RepairStudentRequest $request, StudentRepair $repair)
    {
        $data = $this->service->store($request, $repair);
        $this->studentRepair->update($repair->id, ['proof' => $data['file']]);
        return redirect()->back()->with('success', 'Berhasil menambahkan bukti');
    }
}
