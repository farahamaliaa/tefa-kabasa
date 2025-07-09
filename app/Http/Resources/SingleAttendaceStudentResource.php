<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleAttendaceStudentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'checkin' => $this->checkout,
                'name' => $this->classroomStudent->student->user->name,
                'school' => $this->classroomStudent->classroom->schoolYear->school->user->name,
            ],
        ];
    }
}
