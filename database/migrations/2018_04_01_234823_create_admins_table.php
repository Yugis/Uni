<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('full_name');
            $table->string('avatar');
            $table->string('slug');
            $table->boolean('gender');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number', 11);
            $table->integer('creator_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('admins');
    }
}
