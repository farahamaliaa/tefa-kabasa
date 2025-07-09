<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\Religion;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Hash;

class EmployeeImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] == 'NAMA' || $row[0] == null || $row[0] == 'Contoh Format (Jangan Dihapus)') {
            return null;
        }

        $user = User::where('email', $row[1])->first();

        if (!$user) {
            $user = User::create([
                'name' => $row[0] ?? null,
                'email' => $row[1],
                'slug' => Str::slug($row[0]),
                'password' => Hash::make($row[2])
            ]);
        }

        $user->assignRole(RoleEnum::STAFF->value);
        $user->givePermissionTo('view_violation');

        $birthDate = $row[4] ? Carbon::instance(Date::excelToDateTimeObject($row[4])) : null;

        $data = [
            'nip'        => $row[2],
            'birth_place' => $row[3],
            'birth_date' => $birthDate,
            'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
            'nik' => $row[6],
            'phone_number' => $row[7],
            'religion_id' => Religion::where('name', $row[8])->first()->id,
            'address' => $row[9],
            'user_id' => $user->id,
            'status' => RoleEnum::STAFF->value,
        ];

        if (in_array(null, $data)) {
            $user->delete();
            return null;
        }

        $employee = Employee::where('user_id', $user->id)->first();

        if (!$employee) {
            Employee::create($data);
        }
    }
}
