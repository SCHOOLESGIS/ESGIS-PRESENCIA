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
            $table->unsignedBigInteger('cour_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->time('begin_hour');
            $table->time('end_hour');
            $table->enum('status', ['COCHE', 'DECOCHE']);
            $table->softDeletes();
            $table->timestamps();
        });

        schema::table('emargements', function (Blueprint $table) {
            $table->foreign('cour_id')->references('cour_id')->on('cours')->onUpdate('cascade');
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
