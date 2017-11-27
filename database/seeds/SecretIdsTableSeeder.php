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
      $dem = new \App\SecretIds();
      $dem->secret_id = $x;
      if($x < 50) {
        $dem->owner_type = 'App\Instructor';
      } else {
        $dem->owner_type = 'App\Student';
      }
      $dem->save();
    }
  }
}
