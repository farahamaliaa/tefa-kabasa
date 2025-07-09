<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\Migrations\HasForeign;

return new class extends Migration
{
    use HasForeign;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_repairs', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'classroom_student_id');
            $this->addForeignId($table, 'repair_id');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_repairs');
    }
};
