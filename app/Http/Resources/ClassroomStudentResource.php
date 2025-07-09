<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomStudentResource extends JsonResource
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
            'student_id' => $this->student->id,
            'nik' => $this->student->nik,
            'nisn' => $this->student->nisn,
            'email' => $this->student->user->email,
            'student' => $this->student->user->name,
            'gender' => $this->student->gender->label(),
            'image' => $this->student->image != null ? asset(request()->root(). '/storage/'.$this->student->image) : asset(request()->root(). '/public/admin_assets/dist/images/profile/user-1.jpg'),
        ];
    }
}
