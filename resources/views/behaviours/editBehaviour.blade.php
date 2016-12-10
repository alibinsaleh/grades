@extends('layouts.app')

@section('content')
	@if(Auth::user()->user_role == 'admin')
		<form action="{{ url('editbehaviour/' . $behaviour->id) }}" method="post" class="smart-green" enctype="multipart/form-data">
		    <h1>اضافة سلوك للطالب {{ $behaviour->student->name }} في مادة {{ $behaviour->course->name }}</h1>
		    
		    @if (session('success'))
			    <div class="alert alert-success title">
			        {{ session('success') }}
			    </div>
			@endif
		    <label>
		        <span>: السلوك</span>
		        <input id="behaviour" type="text" name="behaviour" value="{{ $behaviour->behaviour }}"/>
		    </label>
		    <label>
		    	<span>: اسم اليوم</span>
		    	<div>
		    		<select name="day_name" id="day_name">
	                    <option value="الأحد" {{ $behaviour->day_name == 'الأحد' ? "selected" :""}}>الأحد</option>
	                    <option value="الاثنين" {{ $behaviour->day_name == 'الاثنين' ? "selected" :""}}>الاثنين</option>
	                    <option value="الثلاثاء" {{ $behaviour->day_name == 'الثلاثاء' ? "selected" :""}}>الثلاثاء</option>
	                    <option value="الأربعاء" {{ $behaviour->day_name == 'الأربعاء' ? "selected" :""}}>الأربعاء</option>
	                    <option value="الخميس" {{ $behaviour->day_name == 'الخميس' ? "selected" :""}}>الخميس</option>
	                    <option value="الجمعة" {{ $behaviour->day_name == 'الجمعة' ? "selected" :""}}>الجمعة</option>
	                    <option value="السبت" {{ $behaviour->day_name == 'السبت' ? "selected" :""}}>السبت</option>
	                </select>
		    	</div>
		    	<span>: اليوم</span>
                <div>
		    		<select name="day" id="day">
	                    @for ($i = 1; $i < 31; $i++)
	                    	<option value="{{ $i }}" {{ $behaviour->day == $i ? "selected" :""}}>{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		        
		        <span>: الشهر</span>
		        <div>
		    		<select name="month" id="month" style="text-align: center;">
		    			@for ($i = 1; $i < 13; $i++)
	                    	<option value="{{ $i }}" {{ $behaviour->month == $i ? "selected" :""}}>{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		        <span>: السنة</span>
		        <div>
		    		<select name="year" id="year">
	                    @for ($i = 2016; $i < 2050; $i++)
	                    	<option value="{{ $i }}" {{ $behaviour->year == $i ? "selected" :""}}>{{ $i }}</option>
	                    @endfor
	                </select>
		    	</div>
		    </label>

		    
		    
		     <label>
		        <button type="submit" class="btn btn-success">حفظ التعديلات</button>
		        <a href="{{ url('/behaviours/' . $behaviour->student->id . '/' . $behaviour->course->id) }}" class="btn btn-primary">الرجوع لقائمة السلوك</a>
		    </label>
		    <input type="hidden" name="student_id" id="student_id" value="{{ $behaviour->student->id }}">
		    <input type="hidden" name="course_id" id="course_id" value="{{ $behaviour->course->id }}">
		    <input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	@else
		<h3 class="alert alert-warning">آسف، لست مخولا بادخال الدرجات</h3>
	@endif
@stop