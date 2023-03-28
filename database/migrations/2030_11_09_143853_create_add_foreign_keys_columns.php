<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->foreignId('level_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('mesures', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('supplies', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
        });
        Schema::table('supplies', function (Blueprint $table) {
            $table->foreignId('typesupply_id')->constrained()->onUpdate('cascade');
        });


        Schema::table('plan_step', function (Blueprint $table) {
            $table->foreignId('plan_id')->constrained()->onUpdate('cascade');
            $table->foreignId('step_id')->constrained()->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_foreign_keys_columns');

        Schema::table('plans', function (Blueprint $table) {
            $table->dropConstrainedForeignId('level_id');
        });
        Schema::table('mesures', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::table('supplies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
        Schema::table('supplies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('typesupply_id');
        });


        Schema::table('plan_step', function (Blueprint $table) {
            $table->dropConstrainedForeignId('plan_id');
            $table->dropConstrainedForeignId('step_id');
        });

    }
};
