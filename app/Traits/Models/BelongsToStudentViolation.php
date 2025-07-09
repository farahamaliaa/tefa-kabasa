<?php

namespace App\Traits\Models;

use App\Models\StudentViolation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToStudentViolation {

    /**
     * Get the school that owns the BelongsToSchool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentViolation(): BelongsTo
    {
        return $this->belongsTo(StudentViolation::class);
    }

}
