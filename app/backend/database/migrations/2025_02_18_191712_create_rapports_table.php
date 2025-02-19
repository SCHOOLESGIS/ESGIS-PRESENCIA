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
            $table->integer('hour_number');
            $table->integer('absence_number');
            $table->integer('justification_number');
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
