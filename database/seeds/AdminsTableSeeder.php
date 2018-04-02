<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
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

        $admin = new \App\Admin();
        $admin->first_name = 'Jack';
        $admin->last_name = 'Doe';
        $admin->full_name = 'Jack Doe';
        $admin->slug = 'jack-doe';
        $admin->gender = 'male';
        $admin->avatar = $male_avatar;
        $admin->email = 'jack@e.com';
        $admin->phone_number = '01153665669';
        $admin->password = bcrypt('password');
        $admin->creator_id = 1;
        $admin->faculty()->associate(2);
        $admin->save();
        \App\SecretIds::where('secret_id', 80)->first()->update(['owner_id' => $admin->id]);

        $admin_2 = new \App\Admin();
        $admin_2->first_name = 'Christina';
        $admin_2->last_name = 'Ervins';
        $admin_2->full_name = 'Christina Ervins';
        $admin_2->slug = 'christina-ervins';
        $admin_2->gender = 'female';
        $admin_2->avatar = $female_avatar;
        $admin_2->email = 'ervins@e.com';
        $admin_2->phone_number = '01153665633';
        $admin_2->password = bcrypt('password');
        $admin_2->creator_id = 1;
        $admin_2->faculty()->associate(1);
        $admin_2->save();
        \App\SecretIds::where('secret_id', 81)->first()->update(['owner_id' => $admin_2->id]);
    }
}
