<?php

namespace App\Http\Resources;

use App\Enums\AttendanceEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceJournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->classroomStudent->id,
            'student' => $this->classroomStudent->student->user->name,
            'nik' => $this->classroomStudent->student->nik,
            'nisn' => $this->classroomStudent->student->nisn,
            'gender' => $this->classroomStudent->student->gender->label(),
            'classroom' => $this->classroomStudent->classroom->name,
            'attendance_status' => $this->status == AttendanceEnum::SICK ? AttendanceEnum::SICK : ($this->status == AttendanceEnum::PRESENT ? AttendanceEnum::PRESENT : ($this->status == AttendanceEnum::LATE ? AttendanceEnum::LATE : ($this->status == AttendanceEnum::ALPHA ? AttendanceEnum::ALPHA : ($this->status == AttendanceEnum::PERMIT ? AttendanceEnum::PERMIT : '-')))),
        ];
    }
}
