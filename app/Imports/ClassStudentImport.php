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
    public $errors = [];

    public function model(array $row)
    {
        if ($row['nama'] == 'Contoh Format(Jangan Dihapus)' || $row['nama'] == null) {
            return null;
        }

        $classroom = Classroom::where('name', $this->sheetName)->first();

        if ($classroom) {
            $class_id = $classroom->id;
            $user = User::where('email', $row['email'])->first();

            if ($user) {
                if ($user->student) {
                    return null;
                }
            } else {
                if ($row['email'] == null) {
                    $this->errors[] = "Email kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['nisn'] == null) {
                    $this->errors[] = "NISN kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['tanggal_lahir'] == null) {
                    $this->errors[] = "Tanggal lahir kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['tempat_lahir'] == null) {
                    $this->errors[] = "Tempat lahir kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['jenis_kelamin'] == null) {
                    $this->errors[] = "Jenis kelamin kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['nik'] == null) {
                    $this->errors[] = "NIK kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['no_kk'] == null) {
                    $this->errors[] = "No KK kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['no_akta'] == null) {
                    $this->errors[] = "No Akta kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['alamat'] == null) {
                    $this->errors[] = "Alamat kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['anak_ke'] == null) {
                    $this->errors[] = "Anak ke kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['jumlah_saudara'] == null) {
                    $this->errors[] = "Jumlah saudara kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                } else if ($row['agama'] == null) {
                    $this->errors[] = "Agama kosong untuk {$row['nama']}, silahkan isi terlebih dahulu";
                    return null;
                }

                $user = User::create([
                    'name' => $row['nama'] ?? null,
                    'email' => $row['email'],
                    'slug' => Str::slug($row['nama']),
                    'password' => Hash::make($row['nisn'])
                ]);
            }

            $studentId = "";
            $user->assignRole(RoleEnum::STUDENT->value);
            $birthDate = Carbon::instance(Date::excelToDateTimeObject($row['tanggal_lahir']))->format('Y-m-d');

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
