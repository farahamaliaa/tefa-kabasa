<?php

namespace App\Traits\Models;

use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToExtracurricular {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extracurricular(): BelongsTo
    {
        return $this->belongsTo(Extracurricular::class);
    }
}
