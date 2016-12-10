@extends('layouts.app')

@section('content')
	<div class="container title" >
		@if (session('success'))
		    <div class="alert alert-success title">
		        {{ session('success') }}
		    </div>
		@endif
		<h3>طلاب شعبة {{ $classroom }} وعددهم {{ count($students) }}</h3>
		
			<table class="table table-striped table-bordered">
				<thead>
					<th colspan="3" style="background-color: #e2e295;">
						<!-- <a href="{{ url('/gradesbyclassroom/'. $classroom . '/' . $course->id) }}" class="btn btn-warning">السلوك للكل</a> -->
						<a href="{{ url('/participationsbyclassroom/'. $classroom . '/' . $course->id) }}" class="btn btn-success">المشاركة للكل</a>
						<a href="{{ url('/gradesbyclassroom/'. $classroom . '/' . $course->id) }}" class="btn btn-danger">الدرجات النهائية للكل</a>
						<!-- <a href="{{ url('/gradesbyclassroom/'. $classroom . '/' . $course->id) }}" class="btn btn-primary">الدرجات للكل</a> -->
					</th>
				</thead>
				<tr>
					<th>العمليات</th>
					<th>اسم الطالب</th>
					<th>الرقم الأكاديمي</th>
				</tr>
				@foreach ($students as $student)
					<tr>
						<td>
							@if(Auth::user()->user_role == 'admin')
								<form action="{{ url('/deletestudent/'. $student->id) }}" method="GET" data-studentid="{{ $student->id }}" data-studentname="{{ $student->name }}">
									<!-- <button class="btn btn-danger">حذف الطالب</button> -->
									<a href="#" class="btn btn-danger delete-student">حذف الطالب</a>
									<!-- <input type="hidden" value="{{ $student->name }}"> -->
									<!-- <a href="#" class="btn btn-danger" id="delete-student">حذف الطالب</a> -->
									<!-- <a href="{{ url('/deletestudent/'. $student->id) }}" class="btn btn-danger">حذف الطالب</a> -->
									<a href="{{ url('/grades_entry/'. $student->id . '/' . $course->id) }}" class="btn btn-primary">الدرجات</a>
									<a href="{{ url('/participations/'. $student->id . '/' . $course->id) }}" class="btn btn-success">المشاركة</a>
									<a href="{{ url('/behaviours/'. $student->id . '/' . $course->id) }}" class="btn btn-warning">السلوك</a>
									<a href="{{ url('/report/'. $student->id . '/' . $course->id) }}" class="btn btn-success">تقرير</a>
									<a href="{{ url('/editstudent/'. $student->id) }}" class="btn btn-primary">تعديل البيانات</a>
								</form>
							@endif
						</td>
						<td>{{ $student->name }}</td>
						<td>{{ $student->academic_id }}</td>
					</tr>
				@endforeach
			</table>
		        <a href="{{ url('/home') }}" class="btn btn-success">الرجوع لقائمة الشعب</a>
	</div>
	
	{{-- Confirm Delete --}}

	<div class="modal fade" id="modal-delete" tabIndex="-1"> 
		<div class="modal-dialog">
			<div class="modal-content"> 
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"> 
						&times;
					</button>
					<h4 class="modal-title">تأكيد عملية الحذف</h4> </div>
					<div class="modal-body"> 
						<p class="lead">
							<i class="fa fa-question-circle fa-lg"></i> 
							&nbsp;
		            		هل أنت متأكد من رغبتك في حذف الطالب
		            		<span id="student-name"></span>؟
						</p> 
					</div>
				<div class="modal-footer">
					<form action="">
						{{ csrf_field() }}
						
						<button type="button" class="btn btn-default" data-dismiss="modal">
							الغاء
						</button> 
						<button type="submit" class="btn btn-danger" id="delete-student-yes">
							<i class="fa fa-times-circle"></i> نعم 
						</button>
	          		</form>
	        	</div>
	      	</div>
	    </div>
	</div>

	<script>
		var token = '{{ Session::token() }}';
		var urlDelete = '{{ url("/deletestudent/") }}';
	</script>


@stop