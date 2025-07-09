<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonScheduleResource extends JsonResource
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
            'update_id' => $this->feedbacks->where('student_id', $this->student_id)->first() ? $this->feedbacks->where('student_id', $this->student_id)->first()->id : '',
            'is_teacher_present' => $this->feedbacks->where('student_id', $this->student_id)->first() ? $this->feedbacks->where('student_id', $this->student_id)->first()->is_teacher_present : null,
            'summary' => $this->feedbacks->where('student_id', $this->student_id)->first() ? $this->feedbacks->where('student_id', $this->student_id)->first()->summary : null,
            'name_subject' => $this->teacherSubject->subject->name,
            'name_teacher' => $this->teacherSubject->employee->user->name,
            'name_classroom' => $this->classroom->name,
            'hour' => Carbon::parse($this->start->start)->format('H:i'). ' - ' .Carbon::parse($this->end->end)->format('H:i'),
            'date' => Carbon::parse($this->created_at)->translatedFormat('d F Y'),
            'time' => explode(' - ', $this->start->name)[1] .' - '. explode(' - ', $this->end->name)[1],
            'status' => $this->teacherJournals->count() > 0 ? 'Mengisi' : 'Belum Mengisi',
        ];
    }
}
