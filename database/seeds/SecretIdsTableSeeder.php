<?php

use Illuminate\Database\Seeder;

class SecretIdsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($x = 0; $x <= 100; $x++) {
      $secret = new \App\SecretIds();
      $secret->id = $x;
      if($x < 50) {
        $secret->tag = 'Instructor';
      } else {
        $secret->tag = 'Student';
      }
      $secret->save();
    }
  }
}
