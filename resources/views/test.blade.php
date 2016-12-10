@extends('layouts.app')

@section('content')
	<h3>Student Name: {{ $student->name }}</h3>
	<h3>Course: {{ $course->name }}</h3>
	<strong><p>Grades:</p></strong>
	@foreach ($grades as $grade)
		<ul>
			<li>{{ $grade->attendance }}</li>
		</ul>
	@endforeach
	<strong><p>Behaviours:</p></strong>
	@foreach ($behaviours as $behaviour)
		<ul>
			<li>{{ $behaviour->behaviour }}</li>
		</ul>
	@endforeach

@stop