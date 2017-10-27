<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_year', function (Blueprint $table) {
          $table->integer('faculty_id')->unsigned()->index();
          $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');

          $table->integer('year_id')->unsigned()->index();
          $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

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
        Schema::dropIfExists('faculty_year');
    }
}
