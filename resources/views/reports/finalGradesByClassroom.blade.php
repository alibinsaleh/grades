@extends('layouts.app')

@section('content')
	<style type="text/css" media="print">
		@page 
		{
		    size: auto;   /* auto is the initial value */
		    margin: 0mm;  /* this affects the margin in the printer settings */
		}
		a:link:after, a:visited:after {  
		  content: normal !important;  
		}
	</style>
	<div class="container">
		<a href="{{ route('reports.dashboard') }}" class="btn btn-success">الرجوع للوحة التقارير</a>
		 <a href="" class="btn btn-primary" onclick="printDiv('printable-area')">طباعة</a>
		 <div id="printable-area">
		 	<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th style="background-color: #f4b342;" colspan="11">طلاب شعبة {{ $classroom }}</th>
				</tr>
			</thead>
			<tr  style="background-color: #548aa8">
				<th>الرقم الأكاديمي</th>
				<th>الاسم</th>
				<th>اختبار نهائي تحريري</th>
				<th>اختبار نهائي عملي شفهي</th>
				<th>اختبارات قصيرة شفهي</th>
				<th>اختبارات قصيرة نظري</th>
				<th>المشروعات</th>
				<th>الملاحظات والمشاركة والتفاعل الصفي</th>
				<th>الواجبات والمهام الأدائية</th>
				<th>ملف الأعمال</th>
				<th>درجة الحضور</th>
			</tr>
			@foreach ($students as  $student)
				<tr>
					<td>{{ $student->academic_id }}</td>
					<td>{{ $student->name }}</td>
					<td>{{ $student->grades->final_theory_test }}</td>
					<td>{{ $student->grades->final_practical_test }}</td>
					<td>{{ $student->grades->short_verbal_test }}</td>
					<td>{{ $student->grades->short_theory_test }}</td>
					<td>{{ $student->grades->projects }}</td>
					<td>{{ $student->grades->participationـinteraction }}</td>
					<td>{{ $student->grades->homework_performance }}</td>
					<td>{{ $student->grades->work_file }}</td>
					<td>{{ $student->grades->attendance }}</td>
				</tr>
			@endforeach
		</table>
		 </div>
		
	</div>
	<script>
		function printDiv(divName) {
		     var printContents = document.getElementById(divName).innerHTML;
		     var originalContents = document.body.innerHTML;

		     document.body.innerHTML = printContents;

		     window.print();

		     document.body.innerHTML = originalContents;
		}
	</script>
@endsection