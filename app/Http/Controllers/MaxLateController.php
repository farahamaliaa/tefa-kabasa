<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\MaxLateInterface;
use App\Models\MaxLate;
use App\Http\Requests\UpdateMaxLateRequest;

class MaxLateController extends Controller
{
    private MaxLateInterface $maxLate;

    public function __construct(MaxLateInterface $maxLate)
    {
        $this->maxLate = $maxLate;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(MaxLate $maxLate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMaxLateRequest $request, MaxLate $maxLate)
    {
        $this->maxLate->update($maxLate->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil memperbarui durasi  maksimal terlambat');
    }
}