<?php

use App\Enums\GuestBookEnum;
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
        Schema::create('guest_books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('position');
            $table->longText('needs');
            $table->date('date');
            $table->enum('status', [GuestBookEnum::INDIVIDUAL->value, GuestBookEnum::NEGERI->value, GuestBookEnum::SWASTA->value])->default(GuestBookEnum::INDIVIDUAL->value);
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_books');
    }
};
