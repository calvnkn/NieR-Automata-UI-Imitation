<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('yorha_units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_id')->unique();        // e.g. "2B", "9S"
            $table->string('unit_type');                // scanner, battle, operator, etc.
            $table->string('access_key');               // hashed password
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('yorha_units');
    }
};
