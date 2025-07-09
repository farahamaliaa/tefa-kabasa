<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ClassroomStudentInterface;
use App\Contracts\Interfaces\ExtracurricularInterface;
use App\Contracts\Interfaces\ExtracurricularStudentInterface;
use App\Models\ExtracurricularStudent;
use App\Http\Requests\StoreExtracurricularStudentRequest;
use App\Http\Requests\UpdateExtracurricularStudentRequest;
use App\Imports\ExtracurricularStudentImport;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExtracurricularStudentController extends Controller
{
    private ExtracurricularStudentInterface $extracurricularStudent;
    private ClassroomStudentInterface $classroomStudent;

    public function __construct(ExtracurricularStudentInterface $extracurricularStudent, classroomStudentInterface $classroomStudent) {
        $this->extracurricularStudent = $extracurricularStudent;
        $this->classroomStudent = $classroomStudent;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreExtracurricularStudentRequest $request, Extracurricular $extracurricular)
    {
        try {
            $exists = $this->extracurricularStudent->check($extracurricular->id, $request->student_id);

            if (!$exists) {
                $this->extracurricularStudent->store([
                    'student_id' => $request->student_id,
                    'extracurricular_id' => $extracurricular->id,
                ]);
                return redirect()->back()->with('success', 'Berhasil menambahkan siswa ke ekstrakurikuler');
            } else {
                return redirect()->back()->with('warning', 'Siswa sudah ada di dalam ekstrakurikuler');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtracurricularStudentRequest $request, ExtracurricularStudent $extracurricularStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExtracurricularStudent $extracurricularStudent)
    {
        try {
            $this->extracurricularStudent->delete($extracurricularStudent->id);
            return redirect()->back()->with('success', 'Berhasil menghapus siswa dari ekstrakurikuler');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function downloadTemplate()
    {
        try {
            $template = public_path('file/excel-format-import-extracurricular-student.xlsx');
            return response()->download($template, 'excel-format-import-extracurricular-student.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function import(Request $request, Extracurricular $extracurricular)
    {
        $file = $request->file('file');

        try {
            Excel::import(new ExtracurricularStudentImport($this->classroomStudent, $this->extracurricularStudent, $extracurricular->id), $file);
            return redirect()->back()->with('success', "Berhasil Mengimport Data!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning', "Gagal Mengimport Data!");
        }
    }
}
