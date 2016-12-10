@extends('layouts.app')

@section('content')
	<div class="container">
		@if(count($participations) > 0)
			@if (session('success'))
			    <div class="alert alert-success title">
			        {{ session('success') }}
			    </div>
			@endif
			<table class="table table-striped table-bordered">
				<tr>
					<th>العمليات</th>
					<th>التاريخ</th>
					<th>المشاركة</th>
				</tr>
				
					@foreach ($participations as $participation)
					<tr>
						<td>
							<a href="{{ url('deleteparticipation/' . $participation->id) }}" class="btn btn-danger">حذف</a>
							<a href="{{ url('editparticipation/' . $participation->id) }}" class="btn btn-primary">تعديل</a>

						</td>
						<td>{{ $participation->day }}/{{ $participation->month }}/{{ $participation->year }}</td>
						<td>{{ $participation->participation_type }}</td>
					</tr>
					@endforeach
			</table>
			<a href="{{ url('/addparticipation/' . $student->id . '/' . $course->id) }}" class="btn btn-success">اضافة مشاركة</a>
			<a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">الرجوع لقائمة الطلاب</a>
		@else
			<h1 class="alert alert-danger title">لا يوجد أي مشاركات مدخل لهذا الطالب</h1>
			<a href="{{ url('/addparticipation/' . $student->id . '/' . $course->id) }}" class="btn btn-success">اضافة مشاركة</a>
			<a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">الرجوع لقائمة الطلاب</a>
		@endif
		
	</div>
@endsection