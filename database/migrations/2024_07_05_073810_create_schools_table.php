<?php

use App\Enums\SchoolEnum;
use App\Models\School;
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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->char('npsn', 8);
            $table->char('phone_number', 15);
            $table->text('image');
            $this->addForeignId($table, 'user_id');
            $this->addForeignId($table, 'province_id');
            $this->addForeignId($table, 'city_id');
            $this->addForeignId($table, 'sub_district_id');
            $table->char('pas_code', 10);
            $table->text('address');
            $table->string('head_school');
            $table->char('nip', 18);
            $table->string('website_school')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(1);
            $table->enum('type', [SchoolEnum::NEGERI->value, SchoolEnum::SWASTA->value]);
            $table->enum('level', [SchoolEnum::SDMI->value, SchoolEnum::SMPMTS->value, SchoolEnum::SMASMKMA->value]);
            $table->string('accreditation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
