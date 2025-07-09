<?php

namespace App\Models;

use App\Models\LessonSchedule;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToLevelClass;
use App\Traits\Models\BelongsToSchoolYear;
use App\Traits\Models\HasManyClassroomStudent;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory, BelongsToEmployee, BelongsToLevelClass, BelongsToSchoolYear, HasManyClassroomStudent;

    protected $fillable = [
        'id',
        'name',
        'employee_id',
        'school_year_id',
        'level_class_id'
    ];

    public $incrementing = false;
    public $keyType = 'char';

    /**
     * Get the lessonSchedule associated with the Classroom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function lessonSchedule(): HasMany
    {
        return $this->hasMany(LessonSchedule::class, 'classroom_id');
    }
}
