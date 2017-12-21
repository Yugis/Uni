<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProfilesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('student_profiles', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('student_id');
      $table->text('about', 140)->nullable();
      $table->string('facebook_link')->nullable();
      $table->string('twitter_link')->nullable();
      $table->string('instagram_link')->nullable();
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
    Schema::dropIfExists('student_profiles');
  }
}
