<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\Grade;
use App\Behaviour;
use App\ShortTheory;
use App\ShortPractical;
use App\Participation;

class ParticipationController extends Controller
{
    public function getParticipations($student_id, $course_id)
    {
    	$student = Student::find($student_id);
    	$course = Course::find($course_id);
    	$participations = Participation::where('student_id', $student_id)
    					->where('course_id', $course_id)->get(); 
    	
    	return view('participations.index', compact('student', 'course', 'participations'));
    }


    public function getParticipationByClassroom($classroom, $course_id)
    {
        $students = Student::where('classroom', $classroom)->orderBy('academic_id')->get();
        $course = Course::find($course_id);

        return view('participations.addParticipationsForClass', compact('students', 'course', 'classroom'));
    }


    public function saveClassroomParticipations(Request $request)
    {

        $mydays = array (
            'Friday' => 'الجمعة',
            'Saturday' => 'السبت',
            'Sunday' => 'الأحد',
            'Monday' => 'الاثنين',
            'Tuesday' => 'الثلاثاء',
            'Wednesday' => 'الأربعاء',
            'Thursday' => 'الخميس',
        );
        
        $classroom = $request['classroom'];
        $students = $students = Student::where('classroom', $classroom)->orderBy('academic_id')->get();
        
        foreach($students as $student)
        {
            $participation = new Participation();
            $participation->student_id = $student->id;
            $participation->course_id = $request['course_id'];
            $participation->participation_type = 'مشاركة صفية';
            $participation->day_name = $mydays[date('l')];
            $participation->day = date('d');
            $participation->month = date('m');
            $participation->year = date('Y');
            if (empty($request['student-'.$student->id])){
                $participation->participation_grade = 1.0;
            } elseif (is_numeric($request['student-'.$student->id])){
                $participation->participation_grade = $request['student-'.$student->id];
            } else {
                $participation->participation_grade = 0.0;
            }
            
            $participation->save();

            // echo $student->id . ' - ' . $request['student-'.$student->id] . '<br>';
        }

        return redirect()->back()->with('success', 'تمت عملية حفظ درجات المشاركة بنجاح');
    }



    public function deleteParticipation($id)
    {
    	$participation = Participation::find($id);
    	$participation->delete();

    	return redirect()->back()->with('success', 'تم حذف المشاركة بنجاح');
    }

    public function addParticipation($student_id, $course_id)
    {
    	$student = Student::find($student_id);
    	$course = Course::find($course_id);

    	return view('participations.addParticipation', compact('student', 'course'));
    }

    public function saveParticipation(Request $request)
    {
    	// dd($request);
    	$this->validate($request, [
    		// 'participation_type' => 'required|alpha',
    		// 'day_name' => 'required|alpha',
    		'day' => 'required|numeric|between:1,31',
    		'month' => 'required|numeric|between:1,12',
    		'year' => 'required|numeric|between:2016,2050',
    	]);

    	$participation = new Participation();
    	$participation->student_id = $request['student_id'];
    	$participation->course_id = $request['course_id'];
    	$participation->participation_type = $request['participation_type'];
    	$participation->participation_grade = $request['participation_grade'];
    	$participation->day_name = $request['day_name'];
    	$participation->day = $request['day'];
    	$participation->month = $request['month'];
    	$participation->year = $request['year'];
    	$participation->save();

    	return redirect()->back()->with('success', 'تم اضافة المشاركة بنجاح');
    }

    public function editParticipation($id)
    {
    	
    	// $student = Student::find($student_id);
    	// $course = Course::find($course_id);
    	$participation = Participation::find($id);
    	// dd($participation_type);

    	return view('participations.editParticipation', compact('participation'));
    	
    }

    public function updateParticipation($id, Request $request)
    {
    	

    	$this->validate($request, [
    		// 'participation_type' => 'required|alpha',
    		// 'day_name' => 'required|alpha',
    		'day' => 'required|numeric|between:1,31',
    		'month' => 'required|numeric|between:1,12',
    		'year' => 'required|numeric|between:1438,1450',
    	]);

    	$participation = Participation::find($id);

    	$participation->student_id = $request['student_id'];
    	$participation->course_id = $request['course_id'];
    	$participation->participation_type = $request['participation_type'];
    	$participation->participation_grade = $request['participation_grade'];
    	$participation->day_name = $request['day_name'];
    	$participation->day = $request['day'];
    	$participation->month = $request['month'];
    	$participation->year = $request['year'];
    	$participation->update();

    	return redirect()->back()->with('success', 'تم حفظ التعديلات بنجاح');
    }
}
