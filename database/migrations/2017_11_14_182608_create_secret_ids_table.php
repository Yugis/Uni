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
      $table->increments('id');
      $table->bigInteger('secret_id')->unsigned()->index()->unique();
      $table->integer('owner_id')->nullable();
      $table->string('owner_type');
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
