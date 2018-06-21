<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('course_student', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('student_id');
      $table->integer('course_id');
      $table->integer('finals')->default(0)->unsigned();
      $table->integer('grades')->default(0)->unsigned();
      $table->integer('attendance')->default(0)->unsigned();
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
    Schema::dropIfExists('course_student');
  }
}
