<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('crane_id');
            $table->foreign('crane_id')->references('id')->on('cranes')->onDelete('cascade');

            $table->unsignedInteger('defect_id');
            $table->foreign('defect_id')->references('id')->on('defects')->onDelete('cascade');

            $table->unsignedInteger('garage_id');
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');

            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
