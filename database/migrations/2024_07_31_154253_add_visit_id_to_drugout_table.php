<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('drugout', function (Blueprint $table) {
            $table->unsignedBigInteger('visit_id')->after('id'); // Add the visit_id column
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('drugout', function (Blueprint $table) {
            $table->dropForeign(['visit_id']);
            $table->dropColumn('visit_id');
        });
    }
};
