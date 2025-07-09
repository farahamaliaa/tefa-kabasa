<?php

namespace App\Traits\Models;

use App\Models\Repair;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToRepair {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function repair(): BelongsTo
    {
        return $this->belongsTo(Repair::class);
    }
}
