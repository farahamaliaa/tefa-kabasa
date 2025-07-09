<?php

namespace App\Http\Resources;

use App\Enums\AttendanceEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryJournalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->lesson_schedule_id,
            'subject' => $this->lessonSchedule->teacherSubject->subject->name,
            'classroom' => $this->lessonSchedule->classroom->name,
            'title' => $this->title,
            'description' => $this->description,
            'date' => Carbon::parse($this->date)->translatedFormat('d F Y'),
            'count_alpha' => $this->attendanceJournals->where('status', AttendanceEnum::ALPHA)->count(),
            'count_sick' => $this->attendanceJournals->where('status', AttendanceEnum::SICK)->count(),
            'count_permit' => $this->attendanceJournals->where('status', AttendanceEnum::PERMIT)->count(),
        ];
    }
}
