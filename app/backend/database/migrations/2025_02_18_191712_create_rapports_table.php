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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id('rapport_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->integer('emargement_debut');
            $table->integer('emargement_fin');
            $table->integer('emargement_confirm');
            $table->integer('emargement_not_confirm');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('rapports', function (Blueprint $table) {
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
