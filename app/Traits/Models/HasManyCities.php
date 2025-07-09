<?php

namespace App\Traits\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyCities {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

}
