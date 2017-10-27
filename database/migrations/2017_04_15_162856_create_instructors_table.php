<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
          $table->increments('id')->index();
          $table->string('job_id')->unsigned()->unique();
          $table->string('first_name', 30);
          $table->string('last_name', 30);
          $table->string('full_name');
          $table->string('avatar');
          $table->string('slug');
          $table->boolean('gender');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('office_location', 3);
          $table->string('phone_number', 11);
          $table->rememberToken();
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
        Schema::dropIfExists('instructors');
    }
}
