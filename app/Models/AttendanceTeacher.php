<?php

namespace App\Models;

use App\Traits\Models\BelongsToEmployee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceTeacher extends Model
{
    use HasFactory, BelongsToEmployee;

    protected $guarded = ['id'];

    protected $fillable = [
        'employee_id',
        'status',
        'proof',
        'checkin',
        'checkout'
    ];
}
