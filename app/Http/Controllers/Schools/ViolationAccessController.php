<?php

namespace App\Http\Controllers\Schools;

use App\Contracts\Interfaces\EmployeeInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ViolationAccessRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class ViolationAccessController extends Controller
{
    private UserInterface $user;
    private EmployeeInterface $employee;

    public function __construct(UserInterface $user, EmployeeInterface $employee)
    {
        $this->user = $user;
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = $this->employee->get();
        $users = $this->employee->getPermission($request);
        return view('school.pages.access-violation.index', compact('employees', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ViolationAccessRequest $request)
    {
        try {
            $data = $request->validated();
            foreach ($data['query'] as $key => $value) {
                $user = $this->user->findOrFail($value);
                $user->givePermissionTo('view_violation');
            }

            return redirect()->back()->with('success', 'Berhasil memberi akses');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tidak dapat menambahkan hak akses');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->revokePermissionTo('view_violation');
            return redirect()->back()->with('success', 'Berhasil manghapus akses');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Tidak bisa manghapus akses');
        }
    }
}
