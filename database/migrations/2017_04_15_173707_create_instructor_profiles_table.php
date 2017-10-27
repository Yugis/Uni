<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('instructor_profiles', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('instructor_id');
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
        Schema::dropIfExists('instructor_profiles');
    }
}
