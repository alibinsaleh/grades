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
        $course = new App\Course();
        $course->course_num = 10001;
        $course->name = 'Mathmetics 1';
        $course->save();

        $course = new App\Course();
        $course->course_num = 10002;
        $course->name = 'Physics 1';
        $course->save();
        
        $course = new App\Course();
        $course->course_num = 10003;
        $course->name = 'Computer 1';
        $course->save();

        $course = new App\Course();
        $course->course_num = 10004;
        $course->name = 'Relegion 1';
        $course->save();

        $course = new App\Course();
        $course->course_num = 10005;
        $course->name = 'Chemistry 1';
        $course->save();
    }
}
