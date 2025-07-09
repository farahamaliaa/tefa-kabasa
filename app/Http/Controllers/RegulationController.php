<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RegulationInterface;
use App\Contracts\Interfaces\SchoolPointInterface;
use App\Http\Requests\UpdateRegulationRequest;
use App\Http\Requests\StoreRegulationRequest;
use App\Imports\RegulationImport;
use App\Models\Regulation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegulationController extends Controller
{
    private RegulationInterface $regulation;
    private SchoolPointInterface $schoolPoint;

    public function __construct(RegulationInterface $regulation, SchoolPointInterface $schoolPoint)
    {
        $this->regulation = $regulation;
        $this->schoolPoint = $schoolPoint;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $regulations = $this->regulation->search($request);
        $schoolPoints = $this->schoolPoint->get();
        $maxPoint = $this->schoolPoint->getMaxPoint();
        return view('school.pages.violation.index', compact('regulations', 'schoolPoints', 'maxPoint'));
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
    public function store(StoreRegulationRequest $request)
    {
        $this->regulation->store($request->validated());
        return redirect()->back()->with('success', 'Berhasil membuat peraturan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(Regulation $regulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Regulation $regulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegulationRequest $request, Regulation $violation)
    {
        $this->regulation->update($violation->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil update peraturan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Regulation $violation)
    {
        $this->regulation->delete($violation->id);
        return redirect()->back()->with('success', 'Berhasil menghapus peraturan');
    }

    public function download()
    {
        try {
            $template = public_path('file/format-excel-regulation.xlsx');
            return response()->download($template, 'format-excel-regulation.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            $import = new RegulationImport($this->regulation);
            Excel::import($import, $file);

            $existingViolations = $import->existingViolations;

            if (count($existingViolations) > 0) {
                $message = 'Pelanggaran sudah tersedia: ' . implode(', ', $existingViolations);
                return redirect()->back()->with('warning', $message);
            } else {
                return redirect()->back()->with('success', "Berhasil Mengimport Data!");
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
