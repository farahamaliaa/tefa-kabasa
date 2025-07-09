<?php

namespace App\Http\Controllers\Staff;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\StudentRepairInterface;
use App\Exports\StudentRepairExport;
use App\Models\StudentRepair;
use App\Http\Requests\StoreStudentRepairRequest;
use App\Http\Requests\UpdateStudentRepairRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingleStoreStudentRepairRequest;
use App\Imports\StudentRepairImport;
use App\Models\Student;
use App\Services\StudentRepairService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentRepairController extends Controller
{
    private StudentRepairInterface $studentRepair;
    private ClassroomStudentInterface $classroomStudent;
    private StudentRepairService $service;

    public function __construct(StudentRepairInterface $studentRepair, ClassroomStudentInterface $classroomStudent, StudentRepairService $service)
    {
        $this->studentRepair = $studentRepair;
        $this->classroomStudent = $classroomStudent;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $studentRepairs = $this->studentRepair->search($request);
        $students = $this->classroomStudent->get();
        return view('staff.pages.repair-student-list.index', compact('studentRepairs', 'students'));
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
    public function store(StoreStudentRepairRequest $request)
    {
        $this->service->store($request);
        return redirect()->back()->with('success', 'Berhasil menambahkan perbaikan');
    }

    public function single_store(SingleStoreStudentRepairRequest $request, Student $student)
    {
        $this->service->single_store($request, $student);
        return redirect()->back()->with('success', 'Berhasil menambahkan perbaikan');
    }

    public function download_student()
    {
        $export = new StudentRepairExport();
        $export->collection();
        return response()->download(storage_path('app/public/siswa-perbaikan.xlsx'))->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $import = new StudentRepairImport(auth()->user()->employee->id);
        Excel::import($import, $file);
        return redirect()->back()->with('success', "Berhasil Mengimport Data!");
    }

    public function approved(StudentRepair $studentRepair)
    {
        $this->service->update_point($studentRepair);
        return redirect()->back()->with('success', 'Berhasil konfirmasi bukti perbaikan');
    }

    public function reject(StudentRepair $studentRepair)
    {
        $this->studentRepair->update($studentRepair->id, ['proof' => null]);
        return redirect()->back()->with('success', 'Berkasil menolak bukti perbaikan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRepairRequest $request, StudentRepair $studentRepair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRepair $studentRepair)
    {
        //
    }
}
