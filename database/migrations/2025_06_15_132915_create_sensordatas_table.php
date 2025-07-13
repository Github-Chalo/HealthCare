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
        Schema::create('sensordatas', function (Blueprint $table) {
            $table->id();
            $table->string("adreno_no");
            $table->string("Spo2");
            $table->string("Heart_rate");
            $table->string("body_temperature");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensordatas');
    }
};
