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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->integer('point')->default(10);
            $table->enum('status', [AttendanceEnum::PRESENT->value, AttendanceEnum::PERMIT->value, AttendanceEnum::SICK->value, AttendanceEnum::ALPHA->value, AttendanceEnum::LATE->value]);
            $table->text('proof')->nullable();
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
