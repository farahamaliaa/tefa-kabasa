<?php

namespace App\Observers;

use App\Models\Extracurricular;
use Illuminate\Support\Str;

class ExtracurricularObserver
{
    public function creating(Extracurricular $extracurricular)
    {
        $extracurricular->id = Str::uuid();
    }
}
