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
            $table->unsignedBigInteger('enseignant_id');
            $table->unsignedBigInteger('module_id');
            $table->date('absence_date');
            $table->enum('status', ['JUSTIFIE', 'NON_JUSTIFIE']);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('absences', function (Blueprint $table) {
            $table->foreign('module_id')->references('module_id')->on('modules')->onUpdate('cascade');
            $table->foreign('enseignant_id')->references('enseignant_id')->on('enseignants')->onUpdate('cascade');
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
