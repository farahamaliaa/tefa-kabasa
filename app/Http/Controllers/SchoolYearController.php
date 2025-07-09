<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\SchoolYearInterface;
use App\Contracts\Interfaces\SemesterInterface;
use App\Http\Requests\StoreSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;
use App\Services\SchoolYearService;
use Illuminate\Http\Request;
use App\Models\SchoolYear;

class SchoolYearController extends Controller
{
    private SchoolYearInterface $schoolYear;
    private SchoolYearService $service;
    private ModelHasRfidInterface $rfid;
    private SemesterInterface $semester;

    public function __construct(SchoolYearInterface $schoolYear, SchoolYearService $service, ModelHasRfidInterface $rfid, SemesterInterface $semester)
    {
        $this->schoolYear = $schoolYear;
        $this->service = $service;
        $this->rfid = $rfid;
        $this->semester = $semester;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schoolYears = $this->schoolYear->search($request);
        $semesters = $this->semester->get();
        return view('school.pages.school-year.index', compact('schoolYears', 'semesters'));
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
    public function store(StoreSchoolYearRequest $request)
    {
        try {
            $this->schoolYear->setNonactive();
            $this->schoolYear->store(['school_year' => $request->school_year]);
            return redirect()->back()->with('success', 'Berhasil menambahkan tahun ajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolYear $schoolYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolYearRequest $request, SchoolYear $schoolYear)
    {
        try {
            $this->schoolYear->update($schoolYear->id, ['school_year' => $request->school_year]);
            return redirect()->back()->with('success', 'Berhasil memperbarui tahun ajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SchoolYear $schoolYear)
    {
        try {
            if($schoolYear->active == true) return redirect()->back()->with('warning','Tidak dapat menghapus tahun ajaran aktif');

            $this->schoolYear->delete($schoolYear->id);
            $this->schoolYear->setActive(['active' => 1]);
            return redirect()->back()->with('success', 'Berhasil menghapus tahun ajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }


    public function setActive(SchoolYear $schoolYear)
    {
        try {
            $this->schoolYear->setNonactive();
            $this->schoolYear->update($schoolYear->id, ['active' => 1]);
            return back()->with('success', 'Berhasil');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
