<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretIdsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('secret_ids', function (Blueprint $table) {
      $table->bigInteger('id')->unsigned()->index()->unique();
      $table->string('tag');
      $table->integer('instructor_id')->nullable();
      $table->foreign('instructor_id')->references('id')->on('instructors');
      $table->integer('student_id')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('secret_ids');
  }
}
