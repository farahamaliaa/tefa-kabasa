<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleAttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'attendance_now' => $this ? \Carbon\Carbon::parse($this->created_at)->translatedFormat('d F Y') - \Carbon\Carbon::parse($this->checkin)->format('H:i') : '' ,
            'status' => $this->status ? $this->status->label() : '',
        ];
    }
}
