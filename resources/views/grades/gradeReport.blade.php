@extends('layouts.app')
		


@section('content')

		

		<form action="" method="post" class="smart-green">
		    <h1>تقرير الطالب {{ $student->name }} في مادة {{ $course->name }}</h1>
		    <label>
		        <span>: الرقم الأكاديمي</span> 
		        <input id="academic_id" type="text" name="academic_id" value="{{ $student->academic_id }}" disabled />
		    </label>
		    <label>
		        <span>: الاسم</span> 
		        <input id="name" type="text" name="name" value="{{ $student->name }}" disabled/>
		    </label>
		    
		    <label>
		        <span>: البريد الالكتروني</span>
		        <input id="email" type="email" name="email" value="{{ $student->email }}" disabled/>
		    </label>
		    
		    <label>
		        <span>: المادة</span>
		        <input id="course_name" type="text" name="course_name" value="{{ $grade->course->name }}" />
		    </label> 

		    <br>
	    	<table class="table table-bordered">
	    		<thead><th colspan="3">المشاركات والتفاعل الصفي</th></thead>
	    		<tr class="dark-bg">
	    			<th>التاريخ</th>
	    			<th>الدرجة</th>
	    			<th>المشاركات</th>
	    		</tr>
	    		@if (count($participations) > 0)
	    			@php ($total = 0 )
		    		@foreach($participations as $participation)
		    			@php ($total += $participation->participation_grade)
						<tr class="white-bg">
							<td>
								{{ $participation->day_name }} 
								{{ $participation->day }}/ 
								{{ $participation->month }}/ 
								{{ $participation->year }}
							</td>
							<td>
								{{ $participation->participation_grade }}
							</td>
							<td>
								{{ $participation->participation_type }}
							</td>
						</tr>
		    		@endforeach
				@endif
				<tr>
					<td colspan="3" style="color: green;">المجموع &raquo;&nbsp;<strong style="color: red;">{{ $total }}</strong></td>
				</tr>
	    	</table>

		    <br>
		    	<table class="table table-bordered">
		    		<thead><th colspan="2">السلوك التفصيلي للطالب</th></thead>
		    		<tr class="dark-bg">
		    			<th>التاريخ</th>
		    			<th>السلوك</th>
		    		</tr>
		    		@if (count($behaviours) > 0)
			    		@foreach($behaviours as $behaviour)
							<tr class="white-bg">
								<td>
									{{ $behaviour->day_name }} 
									{{ $behaviour->day }}/ 
									{{ $behaviour->month }}/ 
									{{ $behaviour->year }}
								</td>
								<td>
									{{ $behaviour->behaviour }}
								</td>
							</tr>
			    		@endforeach
					@endif
		    	</table>
		    <br>
	    	<table class="table table-bordered">
		    	<thead><th colspan="4">الاختبارات النظرية الدورية</th></thead>
		     	<tr class="dark-bg">
		     		<th>[المتوسط [ 0 - 5</th>
		     		<th>[اختبار نظري قصير رقم ٣ [ 0 - 15</th>
		     		<th>[اختبار نظري قصير رقم ٢ [0 - 15</th>
		     		<th>[اختبار نظري قصير رقم ١ [0 - 15</th>
		     	</tr>
		     	<tr class="white-bg">
		     		@php ($short_theory_avg = ceil(($shorttheory->short_theory_1 + $shorttheory->short_theory_2 + $shorttheory->short_theory_3) / 3))
					
	     			<td>{{ $short_theory_avg }}</td>
	     			<td>{{ $shorttheory->short_theory_3 }}</td>
	     			<td>{{ $shorttheory->short_theory_2 }}</td>
	     			<td>{{ $shorttheory->short_theory_1 }}</td>
		     	</tr>
	     	</table>
		    <br>
		    <table class="table table-bordered">
		    	<thead><th colspan="4">الاختبارات العملية الدورية</th></thead>
		     	<tr class="dark-bg">
		     		<th>[المتوسط [ 0 - 5</th>
		     		<th>[اختبار عملي قصير رقم ٣ [ 0 - 15</th>
		     		<th>[اختبار عملي قصير رقم ٢ [0 - 15</th>
		     		<th>[اختبار عملي قصير رقم ١ [0 - 15</th>
		     	</tr>
		     	<tr class="white-bg">
		     		@php ($short_practical_avg = ceil(($shorttheory->short_practical_1 + $shorttheory->short_practical_2 + $shorttheory->short_practical_3) / 3))
					
	     			<td>{{ $short_practical_avg }}</td>
	     			<td>{{ $shortpractical->short_practical_3 }}</td>
	     			<td>{{ $shortpractical->short_practical_2 }}</td>
	     			<td>{{ $shortpractical->short_practical_1 }}</td>
		     	</tr>
		     </table>
		    <br>
		     <table class="table table-bordered">
		     	<tr class="dark-bg">
		     		<th>درجة الحضور &raquo; 0 - 5</th>
		     		<th>ملف الأعمال &raquo; 0 - 5</th>
		     		<th>الواجبات والمهام الأدائية &raquo; 0 - 5</th>
		     		<th>الملاحظة والمشاركة والتفاعل الصفي &raquo; 0 - 5</th>
		     		<th>المشروعات &raquo; 0 - 15</th>
		     		<th>اختبارات قصيرة نظري &raquo; 0 - 5</th>
		     		<th>اختبارات قصيرة شفهي &raquo; 0 - 10</th>
		     		<th>اختبار نهائي عملي شفهي &raquo; 0 - 30</th>
		     		<th>اختبار نهائي تحريري &raquo; 0 - 20</th>
		     	</tr>
		     	<tr class="white-bg">
		     		<td>{{ $grade->attendance }}</td>
		     		<td>{{ $grade->work_file }}</td>
		     		<td>{{ $grade->homework_performance }}</td>
		     		<td>{{ $grade->participationـinteraction }}</td>
		     		<td>{{ $grade->projects }}</td>
		     		<td>{{ $grade->short_theory_test }}</td>
		     		<td>{{ $grade->short_verbal_test }}</td>
		     		<td>{{ $grade->final_practical_test }}</td>
	     			<td>{{ $grade->final_theory_test }}</td>
		     	</tr>
		     </table>
		</form>
@endsection



