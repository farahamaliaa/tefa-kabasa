<?php

namespace App\Services;

use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Contracts\Interfaces\UserInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\UploadTrait;
use App\Models\Employee;
use App\Enums\RoleEnum;
use App\Enums\UploadDiskEnum;
use App\Models\Student;

class StaffService
{
    use UploadTrait;

    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
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
        $rules = $this->user->showEmail($data['email']);
        if($rules) return redirect()->back()->with('warning', 'Data pegawai sudah tersedia');

        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nip']),
        ];
        $user = $this->user->store($dataUser);
        $user->assignRole(RoleEnum::STAFF->value);
        $user->givePermissionTo('view_violation');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = $request->file('image')->store(UploadDiskEnum::STAFF->value, 'public');
        }

        $data['status'] = RoleEnum::STAFF->value;
        $data['user_id'] = $user->id;
        return $data;
    }

    public function update(Employee $employee, UpdateEmployeeRequest $request): array|bool
    {
        $data = $request->validated();

        $dataUser = [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => Hash::make($data['nip']),
        ];
        $this->user->update($employee->user_id, $dataUser);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($employee->image == null) {
                $data['image'] = $request->file('image')->store(UploadDiskEnum::STAFF->value, 'public');
            } else {
                $this->remove($employee->image);
                $data['image'] = $request->file('image')->store(UploadDiskEnum::STAFF->value, 'public');
            }
        } else {
            $data['image'] = $employee->image;
        }

        $data['status'] = RoleEnum::STAFF->value;
        $data['user_id'] = $employee->user_id;
        return $data;
    }

    public function delete(Employee $employee)
    {
        if ($employee->image != null) {
            $this->remove($employee->image);
        }
    }
}
