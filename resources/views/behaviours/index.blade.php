@extends('layouts.app')

@section('content')
	<div class="container">
		@if(count($behaviours) > 0)
			@if (session('success'))
			    <div class="alert alert-success title">
			        {{ session('success') }}
			    </div>
			@endif
			<table class="table table-striped table-bordered">
				<tr>
					<th>العمليات</th>
					<th>التاريخ</th>
					<th>السلوك</th>
				</tr>
				
					@foreach ($behaviours as $behaviour)
					<tr>
						<td>
							<a href="{{ url('deletebehaviour/' . $behaviour->id) }}" class="btn btn-danger">حذف</a>
							<a href="{{ url('editbehaviour/' . $behaviour->id) }}" class="btn btn-primary">تعديل</a>

						</td>
						<td>{{ $behaviour->day }}/{{ $behaviour->month }}/{{ $behaviour->year }}</td>
						<td>{{ $behaviour->behaviour }}</td>
					</tr>
					@endforeach
			</table>
			<a href="{{ url('/addbehaviour/' . $student->id . '/' . $course->id) }}" class="btn btn-success">اضافة سلوك</a>
			<a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">الرجوع لقائمة الطلاب</a>
		@else
			<h1 class="alert alert-danger title">لا يوجد أي سلوك مدخل لهذا الطالب</h1>
			<a href="{{ url('/addbehaviour/' . $student->id . '/' . $course->id) }}" class="btn btn-success">اضافة سلوك</a>
			<a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">الرجوع لقائمة الطلاب</a>
		@endif
		
	</div>
@endsection