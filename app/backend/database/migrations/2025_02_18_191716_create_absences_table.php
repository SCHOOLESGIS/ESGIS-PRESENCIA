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
        Schema::create('absences', function (Blueprint $table) {
            $table->id('absence_id');
            $table->unsignedBigInteger('cour_id');
            $table->date('absence_date');
            $table->enum('status', ['JUSTIFIE', 'NON_JUSTIFIE'])->default('NON_JUSTIFIE');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('absences', function (Blueprint $table) {
            $table->foreign('cour_id')->references('cour_id')->on('cours')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
