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
        $year1 = \App\Year::where('name', 'First')->first();
        $year2 = \App\Year::where('name', 'Second')->first();
        $year3 = \App\Year::where('name', 'Third')->first();
        $year4 = \App\Year::where('name', 'Fourth')->first();

        $cs_faculty = \App\Faculty::where('name', 'Computer Science')->first();
        $business_faculty = \App\Faculty::where('name', 'Business')->first();
        $journalism_faculty = \App\Faculty::where('name', 'Journalism')->first();
        $engineering_faculty = \App\Faculty::where('name', 'Engineering')->first();

        \App\Course::create(['name' => 'Math-1', 'slug' => 'math-1', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Computer Introduction', 'slug' => 'computer-introduction', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Physics', 'slug' => 'physics', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'English', 'slug' => 'english', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Printing Systems', 'slug' => 'printin-systems', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Discrete Mathematics', 'slug' => 'discrete-mathematics', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Electronics', 'slug' => 'electronics', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Math-2', 'slug' => 'math-2', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Structure Programming', 'slug' => 'structure-programming', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Technical Report', 'slug' => 'technical-report', 'faculty_id' => $cs_faculty->id, 'year_id' => $year1->id]);

        \App\Course::create(['name' => 'Color Theory', 'slug' => 'color-theory', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Data Structures', 'slug' => 'data-structures', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Introduction to Information Systems', 'slug' => 'introduction-to-information-systems', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Digital Logical Design', 'slug' => 'digital-logical-design', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Probability', 'slug' => 'probability', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'File Organization', 'slug' => 'file-organization', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);


        \App\Course::create(['name' => 'Object Oriented Programming', 'slug' => 'object-oriented-programming', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Operation Research', 'slug' => 'operation-research', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Software Engineering', 'slug' => 'software-engineering', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Legislation and Contracts', 'slug' => 'legislation-and-contracts', 'faculty_id' => $cs_faculty->id, 'year_id' => $year2->id]);

        \App\Course::create(['name' => 'Artificial Intelligence', 'slug' => 'artificial-intelligence', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Computer Organization and Architecture', 'slug' => 'computer-organization-and-architecture', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Database', 'slug' => 'database', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Numerical', 'slug' => 'numerical', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Prolog', 'slug' => 'prolog', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Management and Marketing', 'slug' => 'management-and-marketing', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Expert System', 'slug' => 'expert-system', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Multimedia', 'slug' => 'multimedia', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Algorithm', 'slug' => 'algorithm', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Networks', 'slug' => 'networks', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Operating System', 'slug' => 'operating-system', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Software Engineering II', 'slug' => 'software-engineering-2', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'System Analysis', 'slug' => 'system-analysis', 'faculty_id' => $cs_faculty->id, 'year_id' => $year3->id]);

        \App\Course::create(['name' => 'Networks II', 'slug' => 'networks-2', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Simulation', 'slug' => 'simulation', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Compiler Theory', 'slug' => 'compiler-theory', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Distributed Computing', 'slug' => 'distributed-computing', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Micro Processor', 'slug' => 'micro-processor', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Natural Language Processing', 'slug' => 'natural-language-processing', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Network Security', 'slug' => 'network-security', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Neural Networks', 'slug' => 'neural-networks', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Project Planning', 'slug' => 'project-planning', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Data Communications', 'slug' => 'data-communications', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Image Processing', 'slug' => 'image-processing', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Peripherals', 'slug' => 'peripherals', 'faculty_id' => $cs_faculty->id, 'year_id' => $year4->id]);

        \App\Course::create(['name' => 'Auditing', 'slug' => 'auditing', 'faculty_id' => $business_faculty->id, 'year_id' => $year4->id]);
    }
}
