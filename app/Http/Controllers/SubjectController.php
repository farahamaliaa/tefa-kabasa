<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\SubjectInterface;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    private SubjectInterface $subject;
    private ReligionInterface $religions;

    public function __construct(SubjectInterface $subject, ReligionInterface $religions)
    {
        $this->subject = $subject;
        $this->religions = $religions;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subjects = $this->subject->whereSchool($request);
        $religions = $this->religions->get();
        return view('school.pages.subjects.create-subjects', compact('subjects', 'religions'));
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
    public function store(StoreSubjectRequest $request)
    {
        try {
            // dd($request->name);
            if ($this->subject->duplicate($request->name)) return redirect()->back()->with('error', 'Data sudah tersedia');
            $this->subject->store($request->validated());
            return redirect()->back()->with('success', 'Berhasil menambahkan mata pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            $data = $request->validated();
            if ($subject->religion_id == $data['religion_id'] && $subject->name == $data['name']) return redirect()->back()->with('warning', 'Mata Pelajaran Sudah Tersedia');
            $this->subject->update($subject->id, $data);
            return redirect()->back()->with('success', 'Berhasil memperbarui mata pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        try {
            $this->subject->delete($subject->id);
            return redirect()->back()->with('success', 'Berhasil menghapus mata pelajaran');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
