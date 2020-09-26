<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('id_course')->unsigned();
            $table->biginteger('id_subject')->unsigned();
            $table->datetime('time_start');
            $table->datetime('time_end');
            $table->boolean('active');
            $table->timestamps();
        });
        Schema::table('schedules', function (Blueprint $table) {
            $table->foreign('id_course')->references('id')->on('courses');
            $table->foreign('id_subject')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
