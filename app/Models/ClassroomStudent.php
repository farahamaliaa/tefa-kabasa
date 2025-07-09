<?php

namespace App\Models;

use App\Traits\Models\BelongsToClassroom;
use App\Traits\Models\BelongsToStudent;
use App\Traits\Models\HasManyAttendanceJournal;
use App\Traits\Models\HasManyStudentRepair;
use App\Traits\Models\HasManyStudentViolation;
use App\Traits\Models\MorphManyAttendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStudent extends Model
{
    use HasFactory, BelongsToClassroom, BelongsToStudent, MorphManyAttendance, HasManyAttendanceJournal, HasManyStudentRepair, HasManyStudentViolation;

    protected $guarded = ['id'];

    protected $fillable = [
        'student_id',
        'classroom_id',
    ];
}
