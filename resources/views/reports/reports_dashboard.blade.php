@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table table-striped table-bordered">
			<tr>
				<th>التقرير</th>
				<th>الشعب</th>
			</tr>
           
            <tr>
                <td>
                    تقرير الدرجات النهائية
                </td>
                <td>
                	<a href="{{ url('/reports/201') }}" class="btn btn-primary">201</a>
                	<a href="{{ url('/reports/202') }}" class="btn btn-primary">202</a>
                	<a href="{{ url('/reports/203') }}" class="btn btn-primary">203</a>
                	<a href="{{ url('/reports/204') }}" class="btn btn-primary">204</a>
                	<a href="{{ url('/reports/205') }}" class="btn btn-primary">205</a>
                	<a href="{{ url('/reports/206') }}" class="btn btn-primary">206</a>
                </td>
               
            </tr>
           
        </table>
	</div>
	

@stop