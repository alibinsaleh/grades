@extends('layouts.app')

@section('content')
	@if(Auth::user()->user_role == 'admin')
		<form action="{{ route('save.behaviour') }}" method="post" class="smart-green" enctype="multipart/form-data">
		    <h1>اضافة سلوك للطالب {{ $student->name }} في مادة {{ $course->name }}</h1>
		    
		    @if (session('success'))
			    <div class="alert alert-success title">
			        {{ session('success') }}
			    </div>
			@endif
		    <label>
		        <span>: السلوك</span>
		        <input id="behaviour" type="text" name="behaviour" value="{{ old('behaviour') }}"/>
		    </label>
		    <!-- <label>
		    	<span>: اسم اليوم</span>
		    	<div>
		    		<select name="day_name" id="day_name">
	                    <option value="الأحد">الأحد</option>
	                    <option value="الاثنين">الاثنين</option>
	                    <option value="الثلاثاء">الثلاثاء</option>
	                    <option value="الأربعاء">الأربعاء</option>
	                    <option value="الخميس">الخميس</option>
	                </select>
		    	</div>
		    	<span>: اليوم</span>
                <div>
		    		<select name="day" id="day">
	                    @for ($i = 1; $i < 31; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		        
		        <span>: الشهر</span>
		        <div>
		    		<select name="month" id="month" style="text-align: center;">
		    			@for ($i = 1; $i < 13; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		        <span>: السنة</span>
		        <div>
		    		<select name="year" id="year">
	                    @for ($i = 1438; $i < 1451; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		    </label> -->

		    
		    
		     <label>
		        <button type="submit" class="btn btn-success">حفظ</button>
		        <a href="{{ url('/behaviours/' . $student->id . '/' . $course->id) }}" class="btn btn-primary">الرجوع لقائمة السلوك</a>
		    </label>
		    <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
		    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
		    <input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	@else
		<h3 class="alert alert-warning">آسف، لست مخولا بادخال الدرجات</h3>
	@endif
@stop