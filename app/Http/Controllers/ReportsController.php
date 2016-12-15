<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class ReportsController extends Controller
{
    public function gerReportsDashboard()
    {
    	return view('reports.reports_dashboard');
    }

    public function getClassroomFinalGrades($classroom)
    {
    	$students = Student::where('classroom', $classroom)
    						->orderBy('academic_id')
    						->get();
    						

    	return view('reports.finalGradesByClassroom', compact('students', 'classroom'));
    }
}
