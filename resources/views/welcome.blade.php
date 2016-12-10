@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="title">
                    <h1>ثانوية الملك فهد - نظام المقررات</h1>
                </div>

                <!-- <div class="links">
                    <a href="#">حاسب ١</a>
                    @if (Auth::check())
                        <a href="{{ url('/grades/' . Auth::user()->academic_id . '/3') }}">حاسب ٢</a>
                    @else
                        <a href="#">حاسب ٢</a>
                    @endif
                    <a href="#">حاسب ٣</a>
                    
                </div> -->
                
            </div>
        </div>
@endsection
    
