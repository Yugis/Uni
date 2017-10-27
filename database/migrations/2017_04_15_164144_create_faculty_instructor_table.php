<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('faculty_instructor', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('faculty_id');
        $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        $table->integer('instructor_id');
        $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
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
      Schema::dropIfExists('faculty_instructor');
    }
}
