<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StudentViolationInterface;
use App\Http\Requests\SingleStoreStudentViolationRequest;
use App\Models\StudentViolation;
use App\Http\Requests\StoreStudentViolationRequest;
use App\Http\Requests\UpdateStudentViolationRequest;
use App\Models\Student;
use App\Services\StudentViolationService;

class StudentViolationController extends Controller
{
    private StudentViolationInterface $studentViolation;
    private StudentViolationService $service;

    public function __construct(StudentViolationInterface $studentViolation, StudentViolationService $service)
    {
        $this->studentViolation = $studentViolation;
        $this->service = $service;
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
    public function store(StoreStudentViolationRequest $request)
    {
        $this->service->store($request);
        return redirect()->back()->with('success', 'Berhasil menambahkan pelanggar');
    }

    public function single_store(SingleStoreStudentViolationRequest $request, Student $student)
    {
        $this->service->single_store($request, $student);
        return redirect()->back()->with('success', 'Berhasil menambahkan pelanggar');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentViolation $studentViolation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentViolation $studentViolation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentViolationRequest $request, StudentViolation $studentViolation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentViolation $studentViolation)
    {
        //
    }
}
