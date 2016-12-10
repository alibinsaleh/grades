<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Grade;
use App\Behaviour;
use App\Participation;
use App\ShortTheory;
use App\ShortPractical;

class GradeController extends Controller
{

    public function testvuejs()
    {
        return view('testvuejs');
    }


    public function getStudentGrade($student_id, $course_id)
    {
    	$student = Student::where('id', $student_id)->first();
    	$grade = Grade::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first();

    	$course = Course::find($course_id);
    	$behaviours = Behaviour::where('student_id', $student->id)
    					->where('course_id', $course->id)->get(); 
        $participations = Participation::where('student_id', $student->id)
                        ->where('course_id', $course->id)->get(); 

    	$shorttheory = ShortTheory::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 
        $shortpractical = ShortPractical::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first();

        // dd($grade);

    	return view('grades.gradeReport', compact('student', 'grade', 'behaviours', 'participations','shorttheory', 'shortpractical', 'course'));
    	// return view('grades.gradeReport', ['student' => $student, 'grade' => $grade, 'behaviours' => $behaviours]);
    }

    public function getGradesEntry($student_id, $course_id)
    {
        $student = Student::find($student_id);
        $grade = Grade::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 

        $course = Course::find($course_id);
        $shorttheory = ShortTheory::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 
        $shortpractical = ShortPractical::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 

        return view('grades.grades_entry', compact('student', 'shorttheory', 'shortpractical', 'course', 'grade'));        
    }

    public function postUpdateGrades($student_id, $course_id, Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'short_theory_1' => 'required|numeric|between:0.0,15.0',
            'short_theory_2' => 'required|numeric|between:0.0,15.0',
            'short_theory_3' => 'required|numeric|between:0.0,14.0',

            'short_practical_1' => 'required|numeric|between:0.0,15.0',
            'short_practical_2' => 'required|numeric|between:0.0,15.0',
            'short_practical_3' => 'required|numeric|between:0.0,15.0',

            'attendance' => 'required|numeric|between:0.0,5.0',
            'work_file' => 'required|numeric|between:0.0,5.0',
            'homework_performance' => 'required|numeric|between:0.0,5.0',
            'participationـinteraction' => 'required|numeric|between:0.0,5.0',
            'projects' => 'required|numeric|between:0.0,15.0',
            'short_theory_test' => 'required|numeric|between:0.0,5.0',
            'short_verbal_test' => 'required|numeric|between:0.0,10.0',
            'final_practical_test' => 'required|numeric|between:0.0,30.0',
            'final_theory_test' => 'required|numeric|between:0.0,20.0'

        ]);
        // Short Theories
        $shorttheory = ShortTheory::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 
        
        $shorttheory->short_theory_1 = $request['short_theory_1'];
        $shorttheory->short_theory_2 = $request['short_theory_2'];
        $shorttheory->short_theory_3 = $request['short_theory_3'];
        // dd($request['short_theory_1']);
        $shorttheory->update();

        // Short Theories
        $shortpractical = ShortPractical::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 
        
        $shortpractical->short_practical_1 = $request['short_practical_1'];
        $shortpractical->short_practical_2 = $request['short_practical_2'];
        $shortpractical->short_practical_3 = $request['short_practical_3'];
        $shortpractical->update();

        // Grades
        $grades = Grade::where('student_id', $student_id)
                        ->where('course_id', $course_id)->first(); 
        // dd($grades);
        $grades->attendance = $request['attendance'];
        $grades->work_file = $request['work_file'];
        $grades->homework_performance = $request['homework_performance'];
        $grades->participationـinteraction = $request['participationـinteraction'];
        $grades->projects = $request['projects'];
        $grades->short_theory_test = $request['short_theory_test'];
        $grades->short_verbal_test = $request['short_verbal_test'];
        $grades->final_practical_test = $request['final_practical_test'];
        $grades->final_theory_test = $request['final_theory_test'];
        $grades->update();


        return redirect()->back();
    }

    public function getGradesForClassroom($classroom, $course_id)
    {
        $students = Student::where('classroom', $classroom)->orderBy('academic_id')->get();
        $course = Course::find($course_id);

        return view('grades.addGradesForClass', compact('students', 'course', 'classroom'));
    }

    // public function getGradesEntryByClassroom($classroom, $course_id)
    // {
    //     $students = Student::where('classroom', $classroom)->orderBy('academic_id')->get();
    //     $course = Course::find($course_id);

    //     return view('grades.gradesEntryByClassroom', compact('students', 'course', 'classroom'));
    // }

    // public function saveClassroomGrades(Request $request)
    // {

    //     $mydays = array (
    //         'Friday' => 'الجمعة',
    //         'Saturday' => 'السبت',
    //         'Sunday' => 'الأحد',
    //         'Monday' => 'الاثنين',
    //         'Tuesday' => 'الثلاثاء',
    //         'Wednesday' => 'الأربعاء',
    //         'Thursday' => 'الخميس',
    //     );
        
    //     $classroom = $request['classroom'];
    //     $students = $students = Student::where('classroom', $classroom)->orderBy('academic_id')->get();
        
    //     foreach($students as $student)
    //     {
    //         $participation = new Participation();
    //         $participation->student_id = $student->id;
    //         $participation->course_id = $request['course_id'];
    //         $participation->participation_type = 'مشاركة صفية';
    //         $participation->day_name = $mydays[date('l')];
    //         $participation->day = date('d');
    //         $participation->month = date('m');
    //         $participation->year = date('Y');
    //         if (empty($request['student-'.$student->id])){
    //             $participation->participation_grade = 1.0;
    //         } elseif (is_numeric($request['student-'.$student->id])){
    //             $participation->participation_grade = $request['student-'.$student->id];
    //         } else {
    //             $participation->participation_grade = 0.0;
    //         }
            
    //         $participation->save();

    //         // echo $student->id . ' - ' . $request['student-'.$student->id] . '<br>';
    //     }

    //     return redirect()->back()->with('success', 'تمت عملية حفظ درجات المشاركة بنجاح');
    // }
}
