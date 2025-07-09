<?php

use App\Enums\CityTypeEnum;
use App\Traits\Migrations\HasForeign;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    use HasForeign;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', [CityTypeEnum::KABUPATEN->value, CityTypeEnum::KOTA->value]);
            $this->addForeignId($table, 'province_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
