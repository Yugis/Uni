<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorStudentTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('instructor_students', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('instructor_id');
      $table->foreign('instructor_id')->references('id')->on('instructors')->onDelete('cascade');
      $table->integer('student_id');
      $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
    Schema::dropIfExists('instructor_students');
  }
}
