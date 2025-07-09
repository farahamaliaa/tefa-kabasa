<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LevelClassInterface;
use App\Models\LevelClass;
use App\Http\Requests\StoreLevelClassRequest;
use App\Http\Requests\UpdateLevelClassRequest;
use App\Services\LevelClassService;
use Illuminate\Http\Request;

class LevelClassController extends Controller
{
    private LevelClassInterface $levelClass;
    private LevelClassService $service;

    public function __construct(LevelClassInterface $levelClass, LevelClassService $service)
    {
        $this->levelClass = $levelClass;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $levelClasses = $this->levelClass->search($request);
        return view('school.pages.class-level.index', compact('levelClasses'));
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
    public function store(StoreLevelClassRequest $request)
    {
        try {
            if ($this->levelClass->duplicate($request->name)) return redirect()->back()->with('error', 'Data sudah tersedia');  
            $this->levelClass->store($request->validated());
            return redirect()->back()->with('success', 'Berhasil menambahkan tingkatan kelas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LevelClass $levelClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LevelClass $levelClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLevelClassRequest $request, LevelClass $levelClass)
    {
        try {
            $this->levelClass->update($levelClass->id, $request->validated());
            return redirect()->back()->with('success', 'Berhasil mengperbarui tingkatan kelas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LevelClass $levelClass)
    {
        try {
            $this->levelClass->delete($levelClass->id);
            return redirect()->back()->with('success', 'Berhasil menghapus tingkatan kelas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
