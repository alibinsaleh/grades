@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="content">
                <div class="title">
                    <h1>ثانوية الملك فهد - نظام المقررات</h1>
                </div>
                <br>
                <br>
                @if (Auth::user()->user_role == 'student')
                    <div class="title">
                        <h1>أهلا وسهلا بك {{ Auth::user()->name }}</h1>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>تنزيل</th>
                            <th>اسم الملف</th>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset('uploaded_files/file-1.pdf') }}">
                                <!-- <a href="{{ url('/donwload-file') }}"> -->
                                    <img src="{{ asset('img/download.png') }}" size="" alt="" height="42" width="42">
                                </a>
                            </td>
                            <td>اوراق عمل مقررات</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset('uploaded_files/unit-5.pdf') }}">
                                <!-- <a href="{{ url('/donwload-file') }}"> -->
                                    <img src="{{ asset('img/download.png') }}" size="" alt="" height="42" width="42">
                                </a>
                            </td>
                            <td>حل تمارين أوراق العمل - الوحدة الخامسة</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset('uploaded_files/unit-6.pdf') }}">
                                <!-- <a href="{{ url('/donwload-file') }}"> -->
                                    <img src="{{ asset('img/download.png') }}" size="" alt="" height="42" width="42">
                                </a>
                            </td>
                            <td>حل تمارين أوراق العمل - الوحدة السادسة</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ asset('uploaded_files/unit-7.pdf') }}">
                                <!-- <a href="{{ url('/donwload-file') }}"> -->
                                    <img src="{{ asset('img/download.png') }}" size="" alt="" height="42" width="42">
                                </a>
                            </td>
                            <td>حل تمارين أوراق العمل - الوحدة السابعة</td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <div class="links title">
                        <a class="btn btn-success" href="#">حاسب ١</a>
                        <a  class="btn btn-success"href="{{ url('/report/' . Auth::user()->id . '/3') }}">حاسب ٢</a>
                        <a  class="btn btn-success"href="#">حاسب ٣</a>
                    </div>
                @else 
                   <div class="links title">
                        <a class="btn btn-primary" href="{{ url('/students/201') }}">الشعبة 201</a>
                        <a class="btn btn-primary" href="{{ url('/students/202') }}">الشعبة 202</a>
                        <a class="btn btn-primary" href="{{ url('/students/203') }}">الشعبة 203</a>
                        <a class="btn btn-primary" href="{{ url('/students/204') }}">الشعبة 204</a>
                        <a class="btn btn-primary" href="{{ url('/students/205') }}">الشعبة 205</a>
                        <a class="btn btn-primary" href="{{ url('/students/206') }}">الشعبة 206</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
