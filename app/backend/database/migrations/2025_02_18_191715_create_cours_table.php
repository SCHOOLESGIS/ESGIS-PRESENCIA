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
        Schema::create('cours', function (Blueprint $table) {
            $table->id('cour_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('filiere_id');
            $table->date('cour_date');
            $table->time('begin_hour');
            $table->time('end_hour');
            $table->enum('status', ['VALIDE', 'NON_VALIDE']);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('cours', function (Blueprint $table) {
            $table->foreign('module_id')->references('module_id')->on('modules')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onUpdate('cascade');
            $table->foreign('filiere_id')->references('filiere_id')->on('filieres')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
