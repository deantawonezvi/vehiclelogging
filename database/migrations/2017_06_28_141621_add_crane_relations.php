<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCraneRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cranes', function (Blueprint $table) {
            //
            $table->unsignedInteger('defect_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->foreign('defect_id')->references('id')->on('defects')->onDelete('set null');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cranes', function (Blueprint $table) {
            //
        });
    }
}
