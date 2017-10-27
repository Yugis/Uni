<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('students', function (Blueprint $table) {
        $table->increments('id')->index();
        $table->string('first_name', 30);
        $table->string('last_name', 30);
        $table->string('full_name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('avatar');
        $table->string('slug');
        $table->boolean('gender');
        $table->string('phone_number', 11);
    	$table->string('emergency_phone_number', 11)->nullable();
        $table->integer('faculty_id')->unsigned();
        $table->integer('year_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
