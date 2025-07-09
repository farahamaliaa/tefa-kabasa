<?php

namespace App\Traits\Models;

use App\Models\TeacherSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyTeacherSubject {

    /**
     * Get all of the students for the HasManyStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teacherSubjects(): HasMany
    {
        return $this->hasMany(TeacherSubject::class);
    }

}
