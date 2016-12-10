@extends('layouts.app')

@section('content')
	@if(Auth::user()->user_role == 'admin')
		<form action="{{ url('/updategrades/'. $student->id . '/' . $course->id) }}" method="post" class="smart-green" enctype="multipart/form-data">
		    <h1>تعديل درجات الطالب {{ $student->name }} في مادة {{ $course->name }}</h1>
		    <label>
		        <span>: الرقم الأكاديمي</span> 
		        <input id="academic_id" type="text" name="academic_id" value="{{ $student->academic_id }}" disabled />
		    </label>
		    <label>
		        <span>: الاسم</span> 
		        <input id="name" type="text" name="name" value="{{ $student->name }}" disabled/>
		    </label>
		    
		    <label>
		        <span>: البريد الالكتروني</span>
		        <input id="email" type="email" name="email" value="{{ $student->email }}" disabled/>
		    </label>
		    
		    

		    
		    <br>
		    	<table class="table table-bordered">
		     	<tr class="dark-bg">
		     		<th>[المتوسط [ 0 - 5</th>
		     		<th>[اختبار نظري قصير رقم ٣ [ 0 - 15</th>
		     		<th>[اختبار نظري قصير رقم ٢ [0 - 15</th>
		     		<th>[اختبار نظري قصير رقم ١ [0 - 15</th>
		     	</tr>
		     	<tr class="white-bg">
	     			<td>{{ 'n/a' }}</td>
	     			<td><input type="text" name="short_theory_3" value="{{ $shorttheory->short_theory_3 }}"></td>
	     			<td><input type="text" name="short_theory_2" value="{{ $shorttheory->short_theory_2 }}"></td></td>
	     			<td><input type="text" name="short_theory_1" value="{{ $shorttheory->short_theory_1 }}"></td></td>
		     	</tr>
		     </table>
		    <br>
		    <table class="table table-bordered">
		     	<tr class="dark-bg">
		     		<th>[المتوسط [ 0 - 5</th>
		     		<th>[اختبار عملي قصير رقم ٣ [ 0 - 15</th>
		     		<th>[اختبار عملي قصير رقم ٢ [0 - 15</th>
		     		<th>[اختبار عملي قصير رقم ١ [0 - 15</th>
		     	</tr>
		     	<tr class="white-bg">
		     		<td>{{ 'n/a' }}</td>
		     		<td><input type="text" name="short_practical_3" value="{{ $shortpractical->short_practical_3 }}"></td>
	     			<td><input type="text" name="short_practical_2" value="{{ $shortpractical->short_practical_2 }}"></td>
	     			<td><input type="text" name="short_practical_1" value="{{ $shortpractical->short_practical_1 }}"></td>
		     	</tr>
		     </table>
		    <br>
		     <table class="table table-bordered">
		     	<tr class="dark-bg">
		     		<th>درجة الحضور &raquo; 0 - 5</th>
		     		<th>ملف الأعمال &raquo; 0 - 5</th>
		     		<th>الواجبات والمهام الأدائية &raquo; 0 - 5</th>
		     		<th>الملاحظة والمشاركة والتفاعل الصفي &raquo; 0 - 5</th>
		     		<th>المشروعات &raquo; 0 - 15</th>
		     		<th>اختبارات قصيرة نظري &raquo; 0 - 5</th>
		     		<th>اختبارات قصيرة شفهي &raquo; 0 - 10</th>
		     		<th>اختبار نهائي عملي شفهي &raquo; 0 - 30</th>
		     		<th>اختبار نهائي تحريري &raquo; 0 - 20</th>
		     	</tr>
		     	<tr class="white-bg">
		     		<td><input type="text" name="attendance" value="{{ $grade->attendance }}"></td>
		     		<td><input type="text" name="work_file" value="{{ $grade->work_file }}"></td>
		     		<td><input type="text" name="homework_performance" value="{{ $grade->homework_performance }}"></td>
		     		<td><input type="text" name="participationـinteraction" value="{{ $grade->participationـinteraction }}"></td>
		     		<td><input type="text" name="projects" value="{{ $grade->projects }}"></td>
		     		<td><input type="text" name="short_theory_test" value="{{ $grade->short_theory_test }}"></td>
		     		<td><input type="text" name="short_verbal_test" value="{{ $grade->short_verbal_test }}"></td>
		     		<td><input type="text" name="final_practical_test" value="{{ $grade->final_practical_test }}"></td>
		     		<td><input type="text" name="final_theory_test" value="{{ $grade->final_theory_test }}"></td>
		     	</tr>
		     </table>
		     <label>
		        <button type="submit" class="btn btn-success">حفظ التعديلات</button>
		        <a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">الرجوع لقائمة الطلاب</a>
		    </label>
		    <input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	@else
		<h3>آسف، لست مخولا بادخال الدرجات</h3>
	@endif
@stop