<?php

use Illuminate\Database\Seeder;

class ShortTheoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = App\Student::all();
    	$courses  = App\Course::all();

    	foreach($students as $student):
        	foreach($courses as $course):
        		$short_theory = new App\ShortTheory;
        		$short_theory->student_id = $student->id;
        		$short_theory->course_id  = $course->id;
        		$short_theory->save();
        	endforeach;
        endforeach;
    }
}
