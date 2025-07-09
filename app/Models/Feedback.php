<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_schedule_id',
        'student_id',
        'is_teacher_present',
        'summary'
    ];

    public function lessonSchedule()
    {
        return $this->belongsTo(LessonSchedule::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
