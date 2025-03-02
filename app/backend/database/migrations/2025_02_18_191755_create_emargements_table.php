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
        Schema::create('emargements', function (Blueprint $table) {
            $table->id('emargement_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->time('begin_hour');
            $table->time('end_hour')->nullable();
            $table->enum('status', ['COCHE', 'DECOCHE'])->default("DECOCHE");
            $table->softDeletes();
            $table->timestamps();
        });

        schema::table('emargements', function (Blueprint $table) {
            $table->foreign('module_id')->references('module_id')->on('modules')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emargements');
    }
};
