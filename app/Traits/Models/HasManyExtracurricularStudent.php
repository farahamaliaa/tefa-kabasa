<?php

namespace App\Traits\Models;

use App\Models\ExtracurricularStudent;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyExtracurricularStudent {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extracurricularStudents(): HasMany
    {
        return $this->hasMany(ExtracurricularStudent::class);
    }

}
