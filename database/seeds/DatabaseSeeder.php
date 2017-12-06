<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(FacultiesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(SecretIdsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(InstructorsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
    }
}
