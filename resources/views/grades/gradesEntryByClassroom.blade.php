@extends('layouts.app')

@section('content')
		@if(Auth::user()->user_role == 'admin')

			<div class="container">
				@if (session('success'))
				    <div class="alert alert-success title">
				        {{ session('success') }}
				    </div>
				@endif
				<form action="{{ route('saveclassgrades') }}" method="post" id="form">
					{{ csrf_field() }}
			    	<input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
			    	<input type="hidden" name="classroom" id="classroom" value="{{ $classroom }}">
					<table class="table table-bordered table-striped">
						<thead><th style="background-color: #f4b342;" colspan="3">طلاب شعبة {{ $classroom }}</th></thead>
						<tr  style="background-color: #548aa8">
							<th>الدرجة</th>
							<th>الاسم</th>
							<th>الرقم الأكاديمي</th>
						</tr>
						@foreach ($students as  $student)
							<tr>
								<td><input type="text" name="student-{{ $student->id }}" id="student-{{ $student->id }}" size="3" /></td>
								<td>{{ $student->name }}</td>
								<td>{{ $student->academic_id }}</td>
							</tr>
						@endforeach
					</table>
					 <a href="#" class="btn btn-success delete">حفظ الدرجات</a>
					<!-- <button class="btn btn-success">حفظ الدرجات</button> -->
					<a href="{{ url('/home') }}" class="btn btn-primary">الرجوع لقائمة الشعب</a>
				</form>
				
			</div>
		@endif

		
		
		<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">تأكيد الحفظ</h4>
		      </div>
		      <div class="modal-body">
		        <form action="">
		        	<div class="form-group">
		        		<label for="post-body">Edit the post</label>
		        		<textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
		        	</div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
		        <button type="button" class="btn btn-danger" id="modal-save">No</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
@endsection