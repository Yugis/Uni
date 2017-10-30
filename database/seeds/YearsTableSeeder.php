<?php

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    \App\Year::create(['name' => 'First']);
    \App\Year::create(['name' => 'Second']);
    \App\Year::create(['name' => 'Third']);
    \App\Year::create(['name' => 'Fourth']);
  }
}
