<?php

namespace App\Traits\Models;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyExtracurricular {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extracurriculars(): HasMany
    {
        return $this->hasMany(Extracurricular::class);
    }

}
