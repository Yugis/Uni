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
        $student->password = bcrypt('password');
        $student->faculty_id = 2;
        $student->year_id = 4;
        $student->save();
        $student->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 4])->get());

        \App\SecretIds::where(['secret_id' => 55, 'owner_id' => null])->first()->update(['owner_id' => $student->id]);

        $student->profile()->create(['student_id' => $student->id]);

        $avatar2 = 'public/defaults/avatars/female.png';

        $student2 = new \App\Student();
        $student2->first_name = 'Angie';
        $student2->last_name = 'Varona';
        $student2->full_name = 'Angie Varona';
        $student2->slug = 'Angie-Varona';
        $student2->gender = 'female';
        $student2->avatar = $avatar2;
        $student2->email = 'angievarona@e.com';
        $student2->phone_number = 01153665733;
        $student2->password = bcrypt('password');
        $student2->faculty_id = 2;
        $student2->year_id = 3;
        $student2->save();
        $student2->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 3])->get());

        \App\SecretIds::where(['secret_id' => 66, 'owner_id' => null])->first()->update(['owner_id' => $student2->id]);

        $student2->profile()->create(['student_id' => $student2->id]);
    }
}
