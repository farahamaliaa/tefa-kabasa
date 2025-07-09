<?php

namespace App\Models;

use App\Traits\Models\BelongsToLessonSchedule;
use App\Traits\Models\HasManyAttendanceJournal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherJournal extends Model
{
    use HasFactory, BelongsToLessonSchedule, HasManyAttendanceJournal;

    protected $guarded = ['id'];

}
