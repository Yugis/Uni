<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('quiz_name');
            $table->integer('course_id')->unsigned();
            $table->unique(['quiz_name', 'course_id', 'faculty_id']);
            $table->boolean('active')->default(false);
            $table->integer('faculty_id')->unsigned();
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
        Schema::dropIfExists('quizzes');
    }
}
