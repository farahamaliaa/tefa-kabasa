<?php

namespace App\Traits\Models;

use App\Models\AttendanceRule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToAttendanceRule {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendanceRule(): BelongsTo
    {
        return $this->belongsTo(AttendanceRule::class);
    }
}
