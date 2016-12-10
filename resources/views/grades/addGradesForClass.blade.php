@extends('layouts.app')

@section('content')
		@if(Auth::user()->user_role == 'admin')

			<div class="container">
				@if (session('success'))
				    <div class="alert alert-success title">
				        {{ session('success') }}
				    </div>
				@endif 
				<form action="" method="post" id="class-participations-form">
					{{ csrf_field() }}
			    	<input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
			    	<input type="hidden" name="classroom" id="classroom" value="{{ $classroom }}">
					<table class="table table-bordered table-striped">
						<thead><th style="background-color: #f4b342;" colspan="11">طلاب شعبة {{ $classroom }}</th></thead>
						<tr  style="background-color: #548aa8">
							<th>الرقم الأكاديمي</th>
							<th>الاسم</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
							<th>الدرجة</th>
						</tr>
						@foreach ($students as  $student)
							<tr>
								<td>{{ $student->academic_id }}</td>
								<td>{{ $student->name }}</td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
							</tr>
						@endforeach
					</table>
					 <a href="#" class="btn btn-success" id="save-classroom-participations">حفظ الدرجات</a>
					<!-- <button class="btn btn-success">حفظ الدرجات</button> -->
					<a href="{{ url('/students/' . $classroom) }}" class="btn btn-warning">الرجوع للقائمة السابقة</a>
					<a href="{{ url('/home') }}" class="btn btn-primary">الرجوع لقائمة الشعب</a>
				</form>
				
			</div>
		@endif

		
	
@endsection