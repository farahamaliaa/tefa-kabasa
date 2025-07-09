<?php

use App\Enums\DayEnum;
use App\Traits\Migrations\HasForeign;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasForeign;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lesson_schedules', function (Blueprint $table) {
            $table->id();
            $this->addForeignUuid($table, 'classroom_id');
            $this->addForeignIdTo($table, 'lesson_hour_start', 'lesson_hours');
            $this->addForeignIdTo($table, 'lesson_hour_end', 'lesson_hours');
            $this->addForeignId($table, 'teacher_subject_id');
            $this->addForeignId($table, 'school_year_id');
            $table->enum('day', [DayEnum::MONDAY->value, DayEnum::TUESDAY->value, DayEnum::WEDNESDAY->value, DayEnum::THURSDAY->value, DayEnum::FRIDAY->value, DayEnum::SATURDAY->value, DayEnum::SUNDAY->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_schedules');
    }
};
