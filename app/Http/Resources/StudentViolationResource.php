<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentViolationResource extends JsonResource
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
            'date' => Carbon::parse($this->created_at)->format('d F Y'),
            'type_violation' => $this->regulation->violation,
            'point' => $this->regulation->point,
        ];
    }
}
