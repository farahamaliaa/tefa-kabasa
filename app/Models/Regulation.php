<?php

namespace App\Models;

use App\Traits\Models\HasManyStudentViolation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory, HasManyStudentViolation;

    protected $guarded = ['id'];
}
