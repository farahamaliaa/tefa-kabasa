<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Services\StaffService;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\ModelHasRfidInterface;
use App\Contracts\Interfaces\ReligionInterface;
use App\Imports\EmployeeImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StaffController extends Controller
{
    private UserInterface $user;
    private EmployeeInterface $employee;
    private StaffService $service;
    private ReligionInterface $religion;
    private ModelHasRfidInterface $modelHasRfid;

    public function __construct(UserInterface $user, EmployeeInterface $employee, StaffService $service, ReligionInterface $religion, ModelHasRfidInterface $modelHasRfid)
    {
        $this->user = $user;
        $this->employee = $employee;
        $this->service = $service;
        $this->religion = $religion;
        $this->modelHasRfid = $modelHasRfid;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $staffs = $this->employee->whereSchool(RoleEnum::STAFF->value, $request);
        $religions = $this->religion->get();
        return view('school.pages.employe.index', compact('staffs', 'religions'));
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
            return redirect()->back()->with('success', 'Berhasil menambahkan data staff');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
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
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $data = $this->service->update($employee, $request);
            $this->employee->update($employee->id, $data);
            return redirect()->back()->with('success', 'Berhasil memperbaiki data staff');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $this->service->delete($employee);
            $this->employee->delete($employee->id);
            $employee->user->delete();
            $this->modelHasRfid->delete('App\Models\Employee', $employee->id);
            return redirect()->back()->with('success', 'Data staff berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function downloadTemplate()
    {
        try {
            $template = public_path('file/excel-format-import-staff.xlsx');
            return response()->download($template, 'excel-format-import-staff.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new EmployeeImport, $file);
            return to_route('school.employees.index')->with('success', "Berhasil Mengimport Data!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan'.$th->getMessage());
        }
    }
}
