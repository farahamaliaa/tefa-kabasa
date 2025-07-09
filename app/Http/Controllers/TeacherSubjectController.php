<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TeacherSubjectInterface;
use App\Models\TeacherSubject;
use App\Http\Requests\StoreTeacherSubjectRequest;
use App\Http\Requests\UpdateTeacherSubjectRequest;
use App\Services\TeacherSubjectService;
use Illuminate\Http\Request;

class TeacherSubjectController extends Controller
{
    private TeacherSubjectService $service;
    private TeacherSubjectInterface $teacherSubject;

    public function __construct(TeacherSubjectService $service, TeacherSubjectInterface $teacherSubject)
    {
        $this->service = $service;
        $this->teacherSubject = $teacherSubject;
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
    public function store(StoreTeacherSubjectRequest $request, string $employee)
    {
        try {
            $addedSubjectsCount = $this->service->store($request, $employee);
            if ($addedSubjectsCount > 0) {
                return redirect()->back()->with('success', 'Berhasil menambahkan mata pelajaran');
            }
            return redirect()->back();
            
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $subject)
    {
        $teachers = $this->teacherSubject->getBySubjectId($subject);
        return response()->json(['data' => $teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherSubjectRequest $request, TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherSubject $teacherSubject)
    {
        try {
            $this->teacherSubject->delete($teacherSubject->id);
            return redirect()->back()->with('success', 'Berhail menghapus mata pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
