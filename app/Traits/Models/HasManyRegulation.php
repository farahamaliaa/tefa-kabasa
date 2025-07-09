<?php

namespace App\Traits\Models;

use App\Models\Regulation;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyRegulation {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regulations(): HasMany
    {
        return $this->hasMany(Regulation::class);
    }

}
