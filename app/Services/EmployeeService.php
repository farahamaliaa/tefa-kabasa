<?php

namespace App\Services;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreEmployeeRequest;
use App\Traits\UploadTrait;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeService
{
    use UploadTrait;

    private UserInterface $user;

    public function __construct(UserInterface $user) {
        $this->user = $user;
    }

    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);
        return $this->upload($disk, $file);
    }

    public function store(StoreEmployeeRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['slug']),
            'email' => $data['email'],
            'password' => Hash::make($data['nip']),
        ];
        $user = $this->user->store($dataUser);

        if ($data['status'] == RoleEnum::TEACHER->value) {
            $user->assignRole(RoleEnum::TEACHER->value);
        } else if ($data['status'] == RoleEnum::STAFF->value) {
            $user->assignRole(RoleEnum::STAFF->value);
            $user->givePermissionTo('view_violation');
        }

        $data['user_id'] = $user->id;
        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function update(Employee $employee, UpdateEmployeeRequest $request): array|bool
    {
        $data = $request->validated();
        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['slug']),
            'email' => $data['email'],
            'password' => Hash::make($data['nip']),
        ];
        $this->user->update($request->user_id, $dataUser);

        $data['school_id'] = auth()->user()->school->id;
        return $data;
    }

    public function delete(Employee $employee)
    {
        if ($employee->image != null) {
            $this->remove($employee->image);
        }
        $employee->user->delete();
    }
}
