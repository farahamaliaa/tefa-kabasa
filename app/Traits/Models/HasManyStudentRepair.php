<?php

namespace App\Traits\Models;

use App\Models\StudentRepair;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyStudentRepair {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studentRepairs(): HasMany
    {
        return $this->hasMany(StudentRepair::class);
    }

}
