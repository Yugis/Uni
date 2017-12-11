<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faculty = \App\Faculty::where('name', 'Computer Science')->first();
      $year = \App\Year::where('name', 'Third')->first();
      \App\Course::create(['name' => 'Algorithm', 'slug' => 'algorithm', 'faculty_id' => $faculty->id, 'year_id' => $year->id]);

      $faculty1 = \App\Faculty::where('name', 'Computer Science')->first();
      $year1 = \App\Year::where('name', 'Fourth')->first();
      \App\Course::create(['name' => 'Image Processing', 'slug' => 'image-processing', 'faculty_id' => $faculty1->id, 'year_id' => $year1->id]);

      $faculty2 = \App\Faculty::where('name', 'Computer Science')->first();
      $year2 = \App\Year::where('name', 'Fourth')->first();
      \App\Course::create(['name' => 'Peripherals', 'slug' => 'peripherals', 'faculty_id' => $faculty2->id, 'year_id' => $year2->id]);

      $faculty3 = \App\Faculty::where('name', 'Business')->first();
      $year3 = \App\Year::where('name', 'Fourth')->first();
      \App\Course::create(['name' => 'Auditing', 'slug' => 'auditing', 'faculty_id' => $faculty3->id, 'year_id' => $year3->id]);

      $faculty4 = \App\Faculty::where('name', 'Computer Science')->first();
      $year4 = \App\Year::where('name', 'Third')->first();
      \App\Course::create(['name' => 'Networks', 'slug' => 'neworks', 'faculty_id' => $faculty4->id, 'year_id' => $year4->id]);

      $faculty5 = \App\Faculty::where('name', 'Computer Science')->first();
      $year5 = \App\Year::where('name', 'Fourth')->first();
      \App\Course::create(['name' => 'Data Communications', 'slug' => 'data-communications', 'faculty_id' => $faculty5->id, 'year_id' => $year5->id]);
    }
}
