<?php

namespace App\Models;

use App\Traits\Models\BelongsToExtracurricular;
use App\Traits\Models\BelongsToStudent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtracurricularStudent extends Model
{
    use HasFactory, BelongsToExtracurricular, BelongsToStudent;

    protected $guarded = ['id'];

    protected $fillable = [
        'student_id',
        'extracurricular_id',
    ];
}
