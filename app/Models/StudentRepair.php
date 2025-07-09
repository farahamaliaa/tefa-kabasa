<?php

namespace App\Models;

use App\Traits\Models\BelongsToClassroomStudent;
use App\Traits\Models\BelongsToEmployee;
use App\Traits\Models\BelongsToRepair;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRepair extends Model
{
    use HasFactory, BelongsToClassroomStudent, BelongsToRepair, BelongsToEmployee;

    protected $fillable = [
        'classroom_student_id',
        'repair',
        'point',
        'start_date',
        'end_date',
        'employee_id',
        'proof',
        'is_approved'
    ];
}
