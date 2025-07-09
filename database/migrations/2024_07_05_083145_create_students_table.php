<?php

use App\Traits\Migrations\HasForeign;
use App\Traits\Migrations\HasGender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use HasForeign, HasGender;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'user_id');
            $table->longText('image')->nullable();
            $table->char('nisn', 10);
            $this->addForeignId($table, 'religion_id');
            $this->addGender($table);
            $table->date('birth_date');
            $table->string('birth_place');
            $table->longText('address');
            $table->char('nik', 16);
            $table->string('number_kk');
            $table->string('number_akta');
            $table->integer('order_child');
            $table->integer('count_siblings')->nullable(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
