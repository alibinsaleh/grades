@extends('layouts.app')

@section('content')
		@if(Auth::user()->user_role == 'admin')

			<div class="container">
				@if (session('success'))
				    <div class="alert alert-success title">
				        {{ session('success') }}
				    </div>
				@endif 
				<form action="{{ route('saveclassroomgrades') }}" method="post" id="class-participations-form">
					{{ csrf_field() }}
			    	<input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
			    	<input type="hidden" name="classroom" id="classroom" value="{{ $classroom }}">
					<table class="table table-bordered table-striped">
						<thead><th style="background-color: #f4b342;" colspan="11">طلاب شعبة {{ $classroom }}</th></thead>
						<tr  style="background-color: #548aa8">
							<th>الرقم الأكاديمي</th>
							<th>الاسم</th>
							<th>اختبار نهائي تحريري</th>
							<th>اختبار نهائي عملي شفهي</th>
							<th>اختبارات قصيرة شفهي</th>
							<th>اختبارات قصيرة نظري</th>
							<th>المشروعات</th>
							<th>الملاحظات والمشاركة والتفاعل الصفي</th>
							<th>الواجبات والمهام الأدائية</th>
							<th>ملف الأعمال</th>
							<th>درجة الحضور</th>
						</tr>
						@foreach ($students as  $student)
							<tr>
								<td>{{ $student->academic_id }}</td>
								<td>{{ $student->name }}</td>
								<td><input type="text" name="final_theory_test-{{ $student->id }}" id="final_theory_test-{{ $student->id }}" size="3" value="{{ $student->grades->final_theory_test }}" /></td>
								<td><input type="text" name="final_practical_test-{{ $student->id }}" id="final_practical_test-{{ $student->id }}" size="3" value="{{ $student->grades->final_practical_test }}" /></td>
								<td><input type="text" name="short_verbal_test-{{ $student->id }}" id="short_verbal_test-{{ $student->id }}" size="3" value="{{ $student->grades->short_verbal_test }}" /></td>
								<td><input type="text" name="short_theory_test-{{ $student->id }}" id="short_theory_test-{{ $student->id }}" size="3" value="{{ $student->grades->short_theory_test }}" /></td>
								<td><input type="text" name="projects-{{ $student->id }}" id="projects-{{ $student->id }}" size="3" value="{{ $student->grades->projects }}" /></td>
								<td><input type="text" name="participationـinteraction-{{ $student->id }}" id="participationـinteraction-{{ $student->id }}" size="3" value="{{ $student->grades->participationـinteraction }}" /></td>
								<td><input type="text" name="homework_performance-{{ $student->id }}" id="homework_performance-{{ $student->id }}" size="3" value="{{ $student->grades->homework_performance }}" /></td>
								<td><input type="text" name="work_file-{{ $student->id }}" id="work_file-{{ $student->id }}" size="3" value="{{ $student->grades->work_file }}" /></td>
								<td><input type="text" name="attendance-{{ $student->id }}" id="attendance-{{ $student->id }}" size="3" value="{{ $student->grades->attendance }}" /></td>
							</tr>
						@endforeach
					</table>
					 <!-- <a href="#" class="btn btn-success" id="save-classroom-participations">حفظ الدرجات</a> -->
					<button type="submit" class="btn btn-success">حفظ الدرجات</button>
					<a href="{{ url('/students/' . $classroom) }}" class="btn btn-warning">الرجوع للقائمة السابقة</a>
					<a href="{{ url('/home') }}" class="btn btn-primary">الرجوع لقائمة الشعب</a>
				</form>
				
			</div>
		@endif

		
	
@endsection