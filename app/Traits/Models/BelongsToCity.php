<?php

namespace App\Traits\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToCity {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
