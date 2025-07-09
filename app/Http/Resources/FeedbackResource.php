<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
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
            'is_teacher_present' => $this->is_teacher_present == true ? 'Hadir' : 'Tidak Hadir',
            'summary' => $this->summary,
            'name_student' => $this->student->user->name,
            'class_student' => $this->student->classroomStudents()->latest()->first()->classroom->name,
            'image' => $this->student->image != null ? asset(request()->root(). '/storage/'.$this->student->image) : asset(request()->root(). '/public/admin_assets/dist/images/profile/user-1.jpg'),
        ];
    }
}
