<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceRuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'day' => $this->day,
            'role' => $this->role,
            'checkin_start' => $this->checkin_start,
            'checkin_end' => $this->checkin_end,
            'checkout_start' => $this->checkout_start,
            'checkout_end' => $this->checkout_end
        ];
    }
}
