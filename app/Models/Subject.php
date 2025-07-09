<?php

namespace App\Models;

use App\Traits\Models\BelongsToReligion;
use App\Traits\Models\HasManyTeacherSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory, HasManyTeacherSubject, BelongsToReligion;

    protected $guarded = ['id'];
}
