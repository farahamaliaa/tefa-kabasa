<?php

namespace App\Models;

use App\Enums\GuestBookEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $casts = [
        'status' => GuestBookEnum::class,
    ];
}
