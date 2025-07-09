<?php

namespace App\Traits\Models;

use App\Models\AttendanceRule;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyAttendanceRule {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendanceRules(): HasMany
    {
        return $this->hasMany(AttendanceRule::class);
    }

}
