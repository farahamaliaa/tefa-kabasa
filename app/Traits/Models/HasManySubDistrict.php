<?php

namespace App\Traits\Models;

use App\Models\SubDistrict;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManySubDistrict {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subDistricts(): HasMany
    {
        return $this->hasMany(SubDistrict::class);
    }

}
