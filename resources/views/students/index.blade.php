@extends('layouts.app')

@section('content')
	@if(Auth::user()->user_role == 'admin')
		<div>
			<h1>Hello, {{ Auth::user()->name }}</h1>
		</div>
	@else
		{{  redirect()->route('/home') }}
	@endif
@endsection