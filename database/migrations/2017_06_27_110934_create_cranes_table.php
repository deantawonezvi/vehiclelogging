<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCranesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cranes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('model');
            $table->string('defect')->default('No Defect');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *REPORTS
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cranes');
    }
}
