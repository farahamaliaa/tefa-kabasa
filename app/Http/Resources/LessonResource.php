<?php

namespace App\Http\Resources;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    protected $student;

    public function setStudent(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'time' => 'Jam ke ' . explode(' - ', $this->start->name)[1] .' - '. explode(' - ', $this->end->name)[1],
            'name' => $this->teacherSubject->subject->name,
            'class' => $this->classroom->name,
            'teacher' => $this->teacherSubject->employee->user->name,
            'end_time' => $this->end->end,
            'status' => $this->feedbacks()->where('student_id', $this->student->id)->whereDate('created_at', today())->exists() ? 'Sudah' : 'Belum',
            'feedback' => $this->feedbacks()->where('student_id', $this->student->id)->whereDate('created_at', today())->exists() ? $this->feedbacks()->where('student_id', $this->student->id)->whereDate('created_at', today())->first() : null,
        ];
    }
}
