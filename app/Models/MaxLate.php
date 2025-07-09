<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxLate extends Model
{
    use HasFactory;

    protected $fillable = ['max_late'];
}