<?php

namespace App\Traits\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToSubject {

    /**
     * Get the school that owns the BelongsToSchool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

}
