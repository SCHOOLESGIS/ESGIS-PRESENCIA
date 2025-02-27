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
        Schema::create('modules', function (Blueprint $table) {
            $table->id('module_id');
            $table->string('module_name');
            $table->string('module_code');
            $table->integer('module_hours');
            $table->string('description');
            $table->unsignedBigInteger('filiere_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('modules', function (Blueprint $table) {
            $table->foreign('filiere_id')->references('filiere_id')->on('filieres')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
