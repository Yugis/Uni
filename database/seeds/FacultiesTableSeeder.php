<?php

use Illuminate\Database\Seeder;

class FacultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faculty = \App\Faculty::create(['name' => 'Business']);
      $faculty->years()->syncWithoutDetaching([1,2,3,4]);
      $faculty = \App\Faculty::create(['name' => 'Computer Science']);
      $faculty->years()->syncWithoutDetaching([1,2,3,4]);
      $faculty = \App\Faculty::create(['name' => 'Engineering']);
      $faculty->years()->syncWithoutDetaching([1,2,3,4]);
      $faculty = \App\Faculty::create(['name' => 'Journalism']);
      $faculty->years()->syncWithoutDetaching([1,2,3,4]);
    }
}
