<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
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
        		$grade = new App\Grade();
        		$grade->student_id = $student->id;
        		$grade->course_id  = $course->id;
        		$grade->save();
        	endforeach;
        endforeach;

    }
}
