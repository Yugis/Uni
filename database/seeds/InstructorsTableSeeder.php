<?php

use Illuminate\Database\Seeder;

class InstructorsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $male_avatar = 'public/defaults/avatars/male.png';
        $female_avatar = 'public/defaults/avatars/female.png';

        $instructor = new \App\Instructor();
        $instructor->job_title = 'Professor';
        $instructor->first_name = 'John';
        $instructor->last_name = 'Doe';
        $instructor->full_name = 'John Doe';
        $instructor->slug = 'John-Doe';
        $instructor->gender = 'male';
        $instructor->avatar = $male_avatar;
        $instructor->email = 'john@e.com';
        $instructor->phone_number = 01153665777;
        $instructor->password = bcrypt('atensec');
        $instructor->office_location = 'A26';
        $instructor->save();
        $instructor->faculties()->attach(1);
        $instructor->courses()->attach([2, 3]);
        \App\SecretIds::where('secret_id', 33)->first()->update(['owner_id' => $instructor->id]);
        $instructor->profile()->create(['instructor_id' => $instructor->id]);

        $instructor_1 = new \App\Instructor();
        $instructor_1->job_title = 'Teaching Assistant';
        $instructor_1->first_name = 'Jane';
        $instructor_1->last_name = 'Doe';
        $instructor_1->full_name = 'Jane Doe';
        $instructor_1->slug = 'Jane-Doe';
        $instructor_1->gender = 'female';
        $instructor_1->avatar = $female_avatar;
        $instructor_1->email = 'jane@e.com';
        $instructor_1->phone_number = 01153665778;
        $instructor_1->password = bcrypt('atensec');
        $instructor_1->office_location = 'A23';
        $instructor_1->save();
        $instructor_1->faculties()->attach(2);
        $instructor_1->courses()->attach(2);

        \App\SecretIds::where('secret_id', 44)->first()->update(['owner_id' => $instructor_1->id]);

        $instructor_1->profile()->create(['instructor_id' => $instructor_1->id]);

        $instructor_3 = new \App\Instructor();
        $instructor_3->job_title = 'Instructor';
        $instructor_3->first_name = 'Jeff';
        $instructor_3->last_name = 'Way';
        $instructor_3->full_name = 'Jeff Way';
        $instructor_3->slug = 'Jeff-Way';
        $instructor_3->gender = 'male';
        $instructor_3->avatar = $male_avatar;
        $instructor_3->email = 'jeff@e.com';
        $instructor_3->phone_number = 01153665666;
        $instructor_3->password = bcrypt('atensec');
        $instructor_3->office_location = 'A24';
        $instructor_3->save();
        $instructor_3->faculties()->attach(1);
        $instructor_3->courses()->attach(4);

        \App\SecretIds::where('secret_id', 22)->first()->update(['owner_id' => $instructor_3->id]);

        $instructor_3->profile()->create(['instructor_id' => $instructor_3->id]);
    }
}
