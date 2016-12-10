<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Grade;
use App\Behaviour;
use App\ShortTheory;
use App\ShortPractical;

class BehaviourController extends Controller
{
    public function getBehaviours($student_id, $course_id)
    {
    	$student = Student::find($student_id);
    	$course = Course::find($course_id);
    	$behaviours = Behaviour::where('student_id', $student_id)
    					->where('course_id', $course_id)->get(); 
    	// dd($behaviours);
    	return view('behaviours.index', compact('student', 'course', 'behaviours'));
    }

    public function deleteBehaviour($id)
    {
    	$behaviour = Behaviour::find($id);
    	$behaviour->delete();

    	return redirect()->back()->with('success', 'تم حذف السلوك بنجاح');
    }

    public function addBehaviour($student_id, $course_id)
    {
    	$student = Student::find($student_id);
    	$course = Course::find($course_id);

    	return view('behaviours.addBehaviour', compact('student', 'course'));
    }

    public function saveBehaviour(Request $request)
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

    	// $this->validate($request, [
    	// 	// 'behaviour' => 'required|alpha',
    	// 	// 'day_name' => 'required|alpha',
    	// 	'day' => 'required|numeric|between:1,31',
    	// 	'month' => 'required|numeric|between:1,12',
    	// 	'year' => 'required|numeric|between:1438,1450',
    	// ]);

    	$behaviour = new Behaviour();
    	$behaviour->student_id = $request['student_id'];
    	$behaviour->course_id = $request['course_id'];
    	$behaviour->behaviour = $request['behaviour'];
    	$behaviour->day_name = $mydays[date('l')];
    	$behaviour->day = date('d');
    	$behaviour->month = date('m');
    	$behaviour->year = date('Y');
    	$behaviour->save();

    	return redirect()->back()->with('success', 'تم اضافة السلوك بنجاح');
    }

    public function editBehaviour($id)
    {
    	
    	// $student = Student::find($student_id);
    	// $course = Course::find($course_id);
    	$behaviour = Behaviour::find($id);
    	// dd($behaviour);

    	return view('behaviours.editBehaviour', compact('behaviour'));
    	
    }

    public function updateBehaviour($id, Request $request)
    {
    	

    	$this->validate($request, [
    		// 'behaviour' => 'required|alpha',
    		// 'day_name' => 'required|alpha',
    		'day' => 'required|numeric|between:1,31',
    		'month' => 'required|numeric|between:1,12',
    		'year' => 'required|numeric|between:2016,2050',
    	]);

    	$behaviour = Behaviour::find($id);

    	$behaviour->student_id = $request['student_id'];
    	$behaviour->course_id = $request['course_id'];
    	$behaviour->behaviour = $request['behaviour'];
    	$behaviour->day_name = $request['day_name'];
    	$behaviour->day = $request['day'];
    	$behaviour->month = $request['month'];
    	$behaviour->year = $request['year'];
    	$behaviour->update();

    	return redirect()->back()->with('success', 'تم حفظ التعديلات بنجاح');
    }
}
