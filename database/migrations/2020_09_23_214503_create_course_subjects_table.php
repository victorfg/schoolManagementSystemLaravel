<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('id_course')->unsigned();
            $table->biginteger('id_subject')->unsigned();
            $table->timestamps();
        });
        Schema::table('course_subjects', function (Blueprint $table) {
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
        Schema::dropIfExists('course_subjects');
    }
}
