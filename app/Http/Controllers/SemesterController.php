<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SemesterInterface;
use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
{

    private SemesterInterface $semester;

    public function __construct(SemesterInterface $semester) {
        $this->semester = $semester;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = $this->semester->get();
        return view('school.pages.semesters.index', compact('semesters'));
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
    public function store(StoreSemesterRequest $request)
    {
        try {
            $semester = $this->semester->store($request->validated());
            return response()->json(['semester' => $semester], 200);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
