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
        Schema::create('drugout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drug_id');
            $table->foreign('drug_id')->references('id')->on('drugs')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugout');
    }
};
