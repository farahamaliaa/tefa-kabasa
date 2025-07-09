<?php

use App\Enums\StatusEnum;
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
        Schema::create('employee_journals', function (Blueprint $table) {
            $table->id();
            $this->addForeignId($table, 'employee_id');
            $table->string('title');
            $table->longText('description');
            $table->enum('status', [StatusEnum::COMPLETED->value, StatusEnum::NOT_COMPLETED->value])->default(StatusEnum::NOT_COMPLETED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_journals');
    }
};
