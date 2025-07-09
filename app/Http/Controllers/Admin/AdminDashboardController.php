<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\SchoolInterface;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    private EmployeeInterface $employee;
    private SchoolInterface $school;

    public function __construct(EmployeeInterface $employee, SchoolInterface $school)
    {
        $this->employee = $employee;
        $this->school = $school;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->employee->getCountEmployee(RoleEnum::TEACHER->value);
        $school_active = $this->school->getActiveCount('1');
        $school_not_active = $this->school->getActiveCount('0');
        return view('admin.pages.dashboard', compact('teachers','school_active','school_not_active'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
