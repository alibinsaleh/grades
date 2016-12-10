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
        $student = new App\Student();
        $student->academic_id = '37001';
        $student->name = 'Mohammed Abdulhameed Alduhneed';
        $student->dob = Date('Ymd');
        $student->email = 'moh-123@hotmail.com';
        $student->password = bcrypt('123456');
        $student->classroom = 201;
        $student->save();

        $student = new App\Student();
        $student->academic_id = '37002';
        $student->name = 'Ali Abdullah Almohammed Saleh';
        $student->dob = Date('Ymd');
        $student->email = 'alibinsaleh@gmail.com';
        $student->password = bcrypt('123456');
        $student->classroom = 201;
        $student->save();

        $student = new App\Student();
        $student->academic_id = '37003';
        $student->name = 'Sajjad Ahmed Alnufaily';
        $student->dob = Date('Ymd');
        $student->email = 'sajjad@hotmail.com';
        $student->password = bcrypt('123456');
        $student->classroom = 201;
        $student->save();
    }
}
