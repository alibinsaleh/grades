<?php

use Illuminate\Database\Seeder;

class ShortPracticalTableSeeder extends Seeder
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
        		$short_practical = new App\ShortPractical;
        		$short_practical->student_id = $student->id;
        		$short_practical->course_id  = $course->id;
        		$short_practical->save();
        	endforeach;
        endforeach;
    }
}
