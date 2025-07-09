<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\RepairInterface;
use App\Models\Repair;
use App\Http\Requests\StoreRepairRequest;
use App\Http\Requests\UpdateRepairRequest;

class RepairController extends Controller
{
    private RepairInterface $repair;

    public function __construct(RepairInterface $repair)
    {
        $this->repair = $repair;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairs = $this->repair->get();
        return view('', compact('repairs'));
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
    public function store(StoreRepairRequest $request)
    {
        $this->repair->store($request->validated());
        return redirect()->back()->with('success', 'Data perbaikan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRepairRequest $request, Repair $repair)
    {
        $this->repair->update($repair->id, $request->validated());
        return redirect()->back()->with('success', 'Data perbaikan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        $this->repair->delete($repair->id);
        return redirect()->back()->with('success', 'Data perbaikan berhasil dihapus');
    }
}
