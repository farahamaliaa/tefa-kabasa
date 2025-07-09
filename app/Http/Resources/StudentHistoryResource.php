<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => \Carbon\Carbon::parse($this->created_at)->translatedFormat('d F Y'),
            'check_in' => \Carbon\Carbon::parse($this->checkin)->format('H:i'),
            'check_out' => \Carbon\Carbon::parse($this->checkout)->format('H:i'),
            'status' => $this->status ? $this->status->label() : '',
        ];
    }
}   
