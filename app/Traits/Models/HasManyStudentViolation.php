<?php

namespace App\Traits\Models;

use App\Models\StudentViolation;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyStudentViolation {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentViolations(): HasMany
    {
        return $this->hasMany(StudentViolation::class);
    }

}
