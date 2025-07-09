<?php

use App\Enums\AttendanceEnum;
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
        Schema::create('attendance_journals', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'teacher_journal_id');
            $this->addForeignId($table, 'classroom_student_id');
            $table->enum('status', [AttendanceEnum::PRESENT->value, AttendanceEnum::PERMIT->value, AttendanceEnum::SICK->value, AttendanceEnum::ALPHA->value])->default(AttendanceEnum::PRESENT->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance_journals');
    }
};
