<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('courses', function (Blueprint $table) {
      $table->increments('id')->index();
      $table->string('name');
      $table->text('description')->nullable();
      $table->string('appointment')->nullable();
      $table->string('room_id')->nullable();
      $table->timestamps();
      $table->integer('faculty_id')->unsigned();
      $table->integer('year_id')->unsigned();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('courses');
  }
}
