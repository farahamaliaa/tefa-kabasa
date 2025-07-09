<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentRepairResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->classroomStudent->student->user->name,
            'classroom' => $this->classroomStudent->classroom->name,
            'start_date' => Carbon::parse($this->start_date)->translatedFormat('d F Y'),
            'end_date' => Carbon::parse($this->end_date)->translatedFormat('d F Y'),
            'type_repair' => $this->repair,
            'status' => $this->is_approved == false ? 'Belum Dikerjakan' : 'Sudah Dikerjakan',
            'point' => $this->point,
        ];
    }
}
