<?php

namespace App\Models;

use App\Enums\AttendanceEnum;
use App\Traits\Models\BelongsToClassroomStudent;
use App\Traits\Models\BelongsToLessonHour;
use App\Traits\Models\BelongsToTeacherJournal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceJournal extends Model
{
    use HasFactory, BelongsToTeacherJournal, BelongsToClassroomStudent, BelongsToLessonHour;

    protected $guarded = ['id'];
    protected $casts = [
        'status' => AttendanceEnum::class,
    ];
}
