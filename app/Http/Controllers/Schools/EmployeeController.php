<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;

class EmployeeController extends Controller
{
    private EmployeeInterface $employee;
    private EmployeeService $service;
    private ReligionInterface $religion;
    private UserInterface $user;

    public function __construct(EmployeeInterface $employee, EmployeeService $service, ReligionInterface $religion, UserInterface $user)
    {
        $this->employee = $employee;
        $this->service = $service;
        $this->religion = $religion;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teachers = $this->employee->getByRole(RoleEnum::TEACHER->value, $request);
        $staffs = $this->employee->getByRole(RoleEnum::STAFF->value, $request);
        $totalTeachers = $this->employee->getByRoleCount(RoleEnum::TEACHER->value, $request);
        $totalStaffs = $this->employee->getByRoleCount(RoleEnum::STAFF->value, $request);

        $religions = $this->religion->get();
        return view('school.pages.employee.index', compact('teachers', 'staffs', 'religions','totalTeachers', 'totalStaffs'));
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
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $this->service->store($request);
            $this->employee->store($data);
            return redirect()->back()->with('success', 'Berhasil menambahkan data pegawai');
        } catch (\Throwable $th) {
            $data = $this->user->showEmail($request->email);
            if ($data) {
                return redirect()->back()->with('warning', 'Data pegawai sudah tersedia');
            } else {
                return redirect()->back()->with('error', 'Kesalahan menambahkan data pegawai');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $data = $this->service->update($employee, $request);
            $this->employee->update($employee->id, $data);
            return redirect();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $this->employee->delete($employee->id);
            return redirect();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan' . $th->getMessage());
        }
    }
}
