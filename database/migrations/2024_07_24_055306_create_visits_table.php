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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients')->onUpdate('cascade')->onDelete('restrict');
            $table->string('blood_pressure');
            $table->double('uric_acid');
            $table->integer('fasting_glucose');
            $table->text('diagnose');
            $table->date('date');
            // $table->unsignedBigInteger('drug_id');
            // $table->foreign('drug_id')->references('id')->on('drugs')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visit');
    }
};
