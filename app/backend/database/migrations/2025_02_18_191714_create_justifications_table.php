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
        Schema::create('justifications', function (Blueprint $table) {
            $table->id('justification_id');
            $table->unsignedBigInteger('absence_id');
            $table->string('type');
            $table->string('doc');
            $table->timestamps();
        });

        schema::table('justifications', function (Blueprint $table) {
            $table->foreign('absence_id')->references('absence_id')->on('absences')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('justifications');
    }
};
