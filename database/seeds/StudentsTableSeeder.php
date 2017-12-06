<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $avatar = 'public/defaults/avatars/male.png';

        $student = new \App\Student();
        $student->first_name = 'Omar';
        $student->last_name = 'Tarek';
        $student->full_name = 'Omar Tarek';
        $student->slug = 'Omar-Tarek';
        $student->gender = 'male';
        $student->avatar = $avatar;
        $student->email = 'omar.tarek.18@e.com';
        $student->phone_number = 01153665774;
        $student->password = bcrypt('atensec');
        $student->faculty_id = 1;
        $student->year_id = 1;
        $student->save();
        $student->courses()->attach(\App\Course::where(['faculty_id' => 1, 'year_id' => 1])->get());

        \App\SecretIds::where('secret_id', 55)->first()->update(['owner_id' => $student->id]);

        $student->profile()->create(['student_id' => $student->id]);
    }
}
