<?php

namespace App\Models;

use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRfid extends Model
{
    use HasFactory, MorphTo;

    protected $guarded = ['id'];
}   
