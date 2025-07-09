<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\HasManyClassroom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelClass extends Model
{
    use HasFactory, BelongsToSchool, HasManyClassroom;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'school_id'
    ];

}
