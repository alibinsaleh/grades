<?php

use Illuminate\Database\Seeder;

class BehaviourTableSeeder extends Seeder
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
        		$behaviour = new App\Behaviour;
        		$behaviour->student_id = $student->id;
        		$behaviour->course_id  = $course->id;
        		$behaviour->save();
        	endforeach;
        endforeach;
        
        
    }
}
