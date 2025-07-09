<?php

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
        Schema::table('student_repairs', function (Blueprint $table) {
            $table->dropForeign(['repair_id']);
            $table->dropColumn('repair_id');
            $table->longText('repair')->after('classroom_student_id');
            $table->integer('point')->default(0)->after('repair');
            $table->date('start_date')->after('point');
            $table->date('end_date')->after('start_date');
            $table->text('proof')->nullable()->after('end_date');
            $this->addForeignId($table, 'employee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_repairs', function (Blueprint $table) {
            $table->foreignId('repair_id')->constrained()->after('classroom_student_id');
            $table->dropColumn('point');
            $table->dropColumn('repair');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
        });
    }
};
