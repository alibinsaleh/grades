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
class StudentController extends Controller
{
    public function index()
    {
    	
    	return view('students.index');
    	
    }

    public function getAllStudents($classroom)
    {
    	$students = Student::orderBy('academic_id', 'asc')->where('classroom', $classroom)->get();
    	$course = Course::find(3);

    	return view('students.allstudents', compact('students', 'course', 'classroom'));
    }

    public function getEditStudent($id)
    {
        $student = Student::find($id);

        return view('students.editstudent', compact('student'));
    }
    public function postEditStudent($id, Request $request)
    {
        $this->validate($request, [
            
            'name' => 'required|max:255',
            'classroom' => 'required|numeric'
        ]);

        $student = Student::find($id);

        
        $student->name = $request['name'];
        $student->classroom = $request['classroom'];
        $student->update();

        return redirect()->back()->with('success', 'تم حفظ التعديلات بنجاح');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        $grade  = Grade::where('student_id', $student->id)->first();
        $shorttheory = ShortTheory::where('student_id', $student->id)->first();
        $shortpractical = ShortPractical::where('student_id', $student->id)->first();
        $participations = Participation::where('student_id', $student->id)->get();
        $behaviours = Behaviour::where('student_id', $student->id)->get();
        $student->delete();
        $grade->delete();
        $shorttheory->delete();
        $shortpractical->delete();
        foreach ($participations as $participation)
        {
            $participation->delete();
        }
        foreach ($behaviours as $behaviour)
        {
            $behaviour->delete();
        }
       

        return redirect()->back()->with('success', 'تم حذف الطالب بنجاح');
        // dd($student,$grade, $shorttheory, $shortpractical, $participations);
    }
}
