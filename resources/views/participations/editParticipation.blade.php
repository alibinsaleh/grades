@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">تعديل مشاركة الطالب {{ $participation->student->name }} في مادة {{ $participation->course->name }}</div>
                <div class="panel-body">
                	@if (session('success'))
					    <div class="alert alert-success title">
					        {{ session('success') }}
					    </div>
					@endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('editparticipation/' . $participation->id) }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('participation_type') ? ' has-error' : '' }}">
                            <label for="participation_type" class="col-md-4 control-label">نوع المشاركة</label>

                            <div class="col-md-6">
                                <input id="participation_type" type="text" class="form-control" name="participation_type" value="{{ $participation->participation_type }}" required autofocus>

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
                                <input id="participation_grade" type="number" class="form-control" name="participation_grade" value="{{ $participation->participation_grade }}" required autofocus>

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
                                    <option value="الأحد" {{ $participation->day_name == 'الأحد' ? "selected" :""}}>الأحد</option>
				                    <option value="الاثنين" {{ $participation->day_name == 'الاثنين' ? "selected" :""}}>الاثنين</option>
				                    <option value="الثلاثاء" {{ $participation->day_name == 'الثلاثاء' ? "selected" :""}}>الثلاثاء</option>
				                    <option value="الأربعاء" {{ $participation->day_name == 'الأربعاء' ? "selected" :""}}>الأربعاء</option>
				                    <option value="الخميس" {{ $participation->day_name == 'الخميس' ? "selected" :""}}>الخميس</option>
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
                                    @for ($i = 1; $i < 31; $i++)
				                    	<option value="{{ $i }}" {{ $participation->day == $i ? "selected" :""}}>{{ $i }}</option>
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
				                    	<option value="{{ $i }}" {{ $participation->month == $i ? "selected" :""}}>{{ $i }}</option>
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
                                    @for ($i = 1438; $i < 1451; $i++)
				                    	<option value="{{ $i }}" {{ $participation->year == $i ? "selected" :""}}>{{ $i }}</option>
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
                                <a href="{{ url('/participations/' . $participation->student->id . '/' . $participation->course->id) }}" class="btn btn-primary">الرجوع لقائمة المشاركات</a>
                            </div>
                        </div>

                        <input type="hidden" name="student_id" id="student_id" value="{{ $participation->student->id }}">
		    			<input type="hidden" name="course_id" id="course_id" value="{{ $participation->course->id }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
