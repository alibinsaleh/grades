@extends('layouts.app')

@section('content')
@php
    $mydays = array (
        'Friday' => 'الجمعة',
        'Saturday' => 'السبت',
        'Sunday' => 'الأحد',
        'Monday' => 'الاثنين',
        'Tuesday' => 'الثلاثاء',
        'Wednesday' => 'الأربعاء',
        'Thursday' => 'الخميس',
    );
    $nameOfDay = $mydays[date('l')];
    $day = date('d');
    $month = date('m');
    $year = date('Y');
   
@endphp
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">قيد مشاركة للطالب {{ $student->name }} في مادة {{ $course->name }}</div>
                <div class="panel-body">
                	@if (session('success'))
					    <div class="alert alert-success title">
					        {{ session('success') }}
					    </div>
					@endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('save.participation') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('participation_type') ? ' has-error' : '' }}">
                            <label for="participation_type" class="col-md-4 control-label">نوع المشاركة</label>

                            <div class="col-md-6">
                                <input id="participation_type" type="text" class="form-control" name="participation_type" value="{{ old('participation_type') }}" required autofocus>

                                @if ($errors->has('participation_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('participation_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('participation_grade') ? ' has-error' : '' }}">
                            <label for="participation_grade" class="col-md-4 control-label">درجة المشاركة</label>

                            <div class="col-md-6">
                                <input id="participation_grade" type="number" class="form-control" name="participation_grade" value="{{ old('participation_grade') }}" required autofocus>

                                @if ($errors->has('participation_grade'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('participation_grade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('day_name') ? ' has-error' : '' }}">
                            <label for="day_name" class="col-md-4 control-label">اسم اليوم</label>

                            <div class="col-md-6">
                                <select name="day_name" id="day_name" class="form-control">
                                    <option value="الأحد" {{ $nameOfDay == 'الأحد' ? "selected" :""}}>الأحد</option>
                                    <option value="الاثنين" {{ $nameOfDay == 'الاثنين' ? "selected" :""}}>الاثنين</option>
                                    <option value="الثلاثاء" {{ $nameOfDay == 'الثلاثاء' ? "selected" :""}}>الثلاثاء</option>
                                    <option value="الأربعاء" {{ $nameOfDay == 'الأربعاء' ? "selected" :""}}>الأربعاء</option>
                                    <option value="الخميس" {{ $nameOfDay == 'الخميس' ? "selected" :""}}>الخميس</option>
                                </select>
                               
                                @if ($errors->has('day_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                            <label for="day" class="col-md-4 control-label">اليوم</label>

                            <div class="col-md-6">
                                <select name="day" id="day" class="form-control">
                                    @for ($i = 1; $i < 32; $i++)
                                        <option value="{{ $i }}" {{ $day == $i ? "selected" :""}}>{{ $i }}</option>
				                    @endfor
                                </select>
                                
                                @if ($errors->has('day'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
                            <label for="month" class="col-md-4 control-label">الشهر</label>

                            <div class="col-md-6">
                                <select name="month" id="month" class="form-control">
                                    @for ($i = 1; $i < 13; $i++)
				                    	<option value="{{ $i }}" {{ $month == $i ? "selected" :""}}>{{ $i }}</option>
				                    @endfor
                                </select>
                                
                                @if ($errors->has('month'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('month') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">السنة</label>

                            <div class="col-md-6">
                                <select name="year" id="year" class="form-control">
                                    @for ($i = 2016; $i < 2051; $i++)
				                    	<option value="{{ $i }}" {{ $year == $i ? "selected" :""}}>{{ $i }}</option>
				                    @endfor
                                </select>
                                
                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    حفظ المشاركة
                                </button>
                                <a href="{{ url('/participations/' . $student->id . '/' . $course->id) }}" class="btn btn-primary">الرجوع لقائمة المشاركات</a>
                            </div>
                        </div>

                        <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
		    			<input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
