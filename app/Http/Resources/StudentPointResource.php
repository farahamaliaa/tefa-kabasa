<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentPointResource extends JsonResource
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
            'user_id' => $this->user->id,
            'image' => $this->image != null ? asset(request()->root(). '/storage/'.$this->image) : asset(request()->root(). '/public/admin_assets/dist/images/profile/user-1.jpg'),
            'name' => $this->user->name,
            'email' =>  $this->user->email,
            'class' => $this->classroomStudents()->latest()->first()->classroom->name,
            'nisn' => $this->nisn,
            'gender' => $this->gender->label(),
            'point' => $this->point
        ];
    }
}
