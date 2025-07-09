<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\ClassroomStudent;
use Illuminate\Support\Str;
use App\Models\Religion;
use App\Models\Student;
use App\Enums\RoleEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentImport implements ToModel
{
    private $classroom;

    public function __construct($classroom)
    {
        $this->classroom = $classroom;
    }

    public function model(array $row)
    {
        if (in_array($row[0], ['Nama', 'Contoh Format(Jangan Dihapus)']) || $row[0] == null) {
            return null;
        }

        $user = User::where('email', $row[1])->first();

        if ($user) {
            return null;
        } else {
            $user = User::create([
                'name' => $row[0] ?? null,
                'email' => $row[1],
                'slug' => Str::slug($row[0]),
                'password' => Hash::make($row[2])
            ]);
        }

        $user->assignRole(RoleEnum::STUDENT->value);
        $birthDate = $row[3] ? Carbon::instance(Date::excelToDateTimeObject($row[3])) : null;

        $data = [
            'user_id' => $user->id,
            'nisn'        => $row[2],
            'religion_id' => Religion::where('name', $row[12])->first()->id,
            'gender' => $row[5] == 'Laki-laki' ? 'male' : 'female',
            'birth_date' => $birthDate,
            'birth_place' => $row[4],
            'address' => $row[9],
            'nik' => $row[6],
            'number_kk' => $row[7],
            'number_akta' => $row[8],
            'order_child' => $row[10],
            'count_siblings' => $row[11]
        ];

        if (in_array(null, $data)) {
            $user->delete();
            return null;
        }

        $student_id = Student::create($data)->id;

        ClassroomStudent::create([
            'student_id' => $student_id,
            'classroom_id' => $this->classroom,
        ]);
    }
}
