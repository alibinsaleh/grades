@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">التسجيل</div>
                <div class="panel-body">
                	@if (session('success'))
					    <div class="alert alert-success title">
					        {{ session('success') }}
					    </div>
					@endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editstudent/' . $student->id) }}">
                        {{ csrf_field() }}
                        
                        <!-- <div class="form-group{{ $errors->has('academic_id') ? ' has-error' : '' }}">
                            <label for="academic_id" class="col-md-4 control-label">الرقم الاكاديمي</label>

                            <div class="col-md-6">
                                <input id="academic_id" type="text" class="form-control" name="academic_id" value="{{ $student->academic_id }}" required autofocus>

                                @if ($errors->has('academic_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('academic_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">الاسم الكامل للطالب</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $student->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="classroom" class="col-md-4 control-label">رقم الشعبة</label>

                            <div class="col-md-6">
                                <select name="classroom" id="classroom" class="form-control">
                                    <option value="201">شعبة ٢٠١</option>
                                    <option value="202">شعبة ٢٠٢</option>
                                    <option value="203">شعبة ٢٠٣</option>
                                    <option value="204">شعبة ٢٠٤</option>
                                    <option value="205">شعبة ٢٠٥</option>
                                    <option value="206">شعبة ٢٠٦</option>
                                </select>
                                <!-- <input id="classroom" type="text" class="form-control" name="classroom" value="{{ old('classroom') }}" required autofocus> -->

                                @if ($errors->has('classroom'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('classroom') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $student->email }}" disabled>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">تأكيد كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    حفظ التعديلات
                                </button>
                                <a href="{{ url('/students/' . $student->classroom) }}" class="btn btn-primary">
                                    الرجوع لقائمة طلاب الشعبة
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
