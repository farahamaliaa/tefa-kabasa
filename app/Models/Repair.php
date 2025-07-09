<?php

namespace App\Models;

use App\Traits\Models\HasManyStudentRepair;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory, HasManyStudentRepair;

    protected $fillable = ['name', 'point'];
}
