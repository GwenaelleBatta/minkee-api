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
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('tint')->nullable();
            $table->string('category')->nullable();
            $table->string('width')->nullable();
            $table->string('pictures')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
