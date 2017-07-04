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

            $table->unsignedInteger('garage_id');
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');

            $table->string('description')->nullable();
            $table->string('defect')->nullable();
            $table->string('state')->default('PENDING');

            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();

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
