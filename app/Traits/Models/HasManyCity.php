<?php

namespace App\Traits\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyCity {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function city(): HasMany
    {
        return $this->hasMany(City::class);
    }

}
