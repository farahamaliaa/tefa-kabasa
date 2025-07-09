<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('school_points', function (Blueprint $table) {
            $table->dropColumn('max_points');
            $table->integer('point')->default(10)->after('id');
            $table->longText('description')->nullable()->after('point');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school_points', function (Blueprint $table) {
            $table->integer('max_points')->default(10);
            $table->dropColumn('point');
            $table->dropColumn('description');
        });
    }
};
