<?php

namespace App\Models;

use App\Traits\Models\HasManyClassroom;
use App\Traits\Models\HasManyLessonSchedule;
use App\Traits\Models\HasManySubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory, HasManySubject, HasManyLessonSchedule, HasManyClassroom;

    protected $guarded = ['id'];
}
