<?php

namespace App\Traits\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManySubject {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

}
