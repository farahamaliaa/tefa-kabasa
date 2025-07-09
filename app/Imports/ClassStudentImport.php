<?php

namespace App\Imports;

use App\Models\ClassroomStudent;
use Illuminate\Support\Str;
use App\Models\Classroom;
use App\Models\Religion;
use App\Enums\RoleEnum;
use App\Models\Employee;
use App\Models\LevelClass;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Illuminate\Support\Facades\Hash;

class ClassStudentImport implements ToModel, WithHeadingRow, WithEvents
{
    protected $sheetName;

    public function model(array $row)
    {
        // dd($row);
        if ($row['nama'] == 'Contoh Format(Jangan Dihapus)' || $row['nama'] == null) {
            return null;
        }

        $classroom = Classroom::where('name', $this->sheetName)->first();

        if ($classroom) {
            $class_id = $classroom->id;
            $user = User::where('email', $row['email'])->first();

            if ($user) {
                return null;
            } else {
                $user = User::create([
                    'name' => $row['nama'] ?? null,
                    'email' => $row['email'],
                    'slug' => Str::slug($row['nama']),
                    'password' => Hash::make($row['nisn'])
                ]);
            }

            $studentId = "";
            $user->assignRole(RoleEnum::STUDENT->value);
            $birthDate = $row['tanggal_lahir'] ? Carbon::createFromFormat('Y-m-d', $row['tanggal_lahir'])->format('Y-m-d') : null;

            $data = [
                'user_id' => $user->id,
                'nisn'        => $row['nisn'],
                'religion_id' => Religion::where('name', $row['agama'])->first()->id,
                'gender' => $row['jenis_kelamin'] == 'Laki-laki' ? 'male' : 'female',
                'birth_date' => $birthDate,
                'birth_place' => $row['tempat_lahir'],
                'address' => $row['alamat'],
                'nik' => $row['nik'],
                'number_kk' => $row['no_kk'],
                'number_akta' => $row['no_akta'],
                'order_child' => $row['anak_ke'],
                'count_siblings' => $row['jumlah_saudara']
            ];

            if (in_array(null, $data)) {
                $user->delete();
                return null;
            }

            $student = Student::create($data);
            $studentId = $student->id;

            ClassroomStudent::create([
                'student_id' => $studentId,
                'classroom_id' => $class_id,
            ]);
        } else {
            return null;
        }
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $this->sheetName = $event->getSheet()->getTitle();
            },
        ];
    }
}
