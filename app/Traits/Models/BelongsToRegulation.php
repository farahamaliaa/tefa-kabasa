<?php

namespace App\Traits\Models;

use App\Models\Regulation;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToRegulation {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regulation(): BelongsTo
    {
        return $this->belongsTo(Regulation::class);
    }
}
