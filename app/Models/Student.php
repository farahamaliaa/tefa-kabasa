<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Traits\Models\BelongsToReligion;
use App\Traits\Models\BelongsToSchool;
use App\Traits\Models\BelongsToUser;
use App\Traits\Models\HasManyClassroomStudent;
use App\Traits\Models\HasManyExtracurricularStudent;
use App\Traits\Models\MorphManyRfid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, BelongsToUser,
    BelongsToReligion, HasManyClassroomStudent,
    HasManyExtracurricularStudent, MorphManyRfid;

    protected $guarded = ['id'];
    protected $casts = [
        'gender' => GenderEnum::class
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
