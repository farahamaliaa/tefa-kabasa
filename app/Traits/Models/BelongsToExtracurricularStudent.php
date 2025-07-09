<?php

namespace App\Traits\Models;

use App\Models\ExtracurricularStudent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToExtracurricularStudent {
    /**
     * Get the user that owns the HasUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extracurricularStudent(): BelongsTo
    {
        return $this->belongsTo(ExtracurricularStudent::class);
    }
}
