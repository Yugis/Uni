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
        $student->slug = 'omar-tarek';
        $student->gender = 'male';
        $student->avatar = $avatar;
        $student->email = 'omar.tarek.18@e.com';
        $student->phone_number = '01153665774';
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
        $student2->slug = 'angie-varona';
        $student2->gender = 'female';
        $student2->avatar = $avatar2;
        $student2->email = 'angievarona@e.com';
        $student2->phone_number = '01153665733';
        $student2->password = bcrypt('password');
        $student2->faculty_id = 2;
        $student2->year_id = 3;
        $student2->save();
        $student2->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 3])->get());

        \App\SecretIds::where(['secret_id' => 66, 'owner_id' => null])->first()->update(['owner_id' => $student2->id]);

        $student2->profile()->create(['student_id' => $student2->id]);

        $student3 = new \App\Student();
        $student3->first_name = 'Emma';
        $student3->last_name = 'Weasly';
        $student3->full_name = 'Emma Weasly';
        $student3->slug = 'emma-weasly';
        $student3->gender = 'female';
        $student3->avatar = $avatar2;
        $student3->email = 'emma@e.com';
        $student3->phone_number = '01053665774';
        $student3->password = bcrypt('password');
        $student3->faculty_id = 2;
        $student3->year_id = 4;
        $student3->save();
        $student3->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 4])->get());

        \App\SecretIds::where(['secret_id' => 60, 'owner_id' => null])->first()->update(['owner_id' => $student3->id]);

        $student3->profile()->create(['student_id' => $student3->id]);

        $student4 = new \App\Student();
        $student4->first_name = 'Omar';
        $student4->last_name = 'Wael';
        $student4->full_name = 'Omar Wael';
        $student4->slug = 'omar-wael';
        $student4->gender = 'male';
        $student4->avatar = $avatar;
        $student4->email = 'o.wael@e.com';
        $student4->phone_number = '01253665774';
        $student4->password = bcrypt('password');
        $student4->faculty_id = 2;
        $student4->year_id = 4;
        $student4->save();
        $student4->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 4])->get());

        \App\SecretIds::where(['secret_id' => 61, 'owner_id' => null])->first()->update(['owner_id' => $student4->id]);

        $student4->profile()->create(['student_id' => $student4->id]);

        $student5 = new \App\Student();
        $student5->first_name = 'Abdelrahman';
        $student5->last_name = 'Waheed';
        $student5->full_name = 'Abdelrahman Waheed';
        $student5->slug = 'abdelrahman-waheed';
        $student5->gender = 'male';
        $student5->avatar = $avatar;
        $student5->email = 'waheed@e.com';
        $student5->phone_number = '01044665774';
        $student5->password = bcrypt('password');
        $student5->faculty_id = 2;
        $student5->year_id = 4;
        $student5->save();
        $student5->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 4])->get());

        \App\SecretIds::where(['secret_id' => 62, 'owner_id' => null])->first()->update(['owner_id' => $student5->id]);

        $student5->profile()->create(['student_id' => $student5->id]);

        $student6 = new \App\Student();
        $student6->first_name = 'Samy';
        $student6->last_name = 'Mankarous';
        $student6->full_name = 'Samy Mankarous';
        $student6->slug = 'samy-mankarous';
        $student6->gender = 'male';
        $student6->avatar = $avatar;
        $student6->email = 'samy@e.com';
        $student6->phone_number = '01155895774';
        $student6->password = bcrypt('password');
        $student6->faculty_id = 2;
        $student6->year_id = 4;
        $student6->save();
        $student6->courses()->attach(\App\Course::where(['faculty_id' => 2, 'year_id' => 4])->get());

        \App\SecretIds::where(['secret_id' => 63, 'owner_id' => null])->first()->update(['owner_id' => $student6->id]);

        $student6->profile()->create(['student_id' => $student6->id]);
    }
}
