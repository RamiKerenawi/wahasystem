@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								قائمة آخر الأيتام المسجلين
							</div>
							<div class="col-md-2">
								<a class="btn btn-small btn-success" href="{{ URL::to('orphans/create' ) }}">جديد</a>
							<div>
						</div>
					</div>

					<div class="panel-body">
						
						<!--{{ trans('adminlte_lang::message.logged') }}-->

						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<td>الرقم</td>
									<td>الاسم</td>
									<td>المدينة</td>
									<td>رقم التليفون</td>
									<td>الإجراءات</td>
								</tr>
							</thead>
							<tbody>
							@foreach($orphans as $key => $value)
								<tr>
									<td>{{ $value->id }}</td>
									<td>{{ $value->first_name }} {{ $value->father_name }} {{ $value->grandfather_name }} {{ $value->family_name }}</td>
									<td>{{ $value->email }}</td>
									<td>{{ $value->nerd_level }}</td>

									<!-- we will also add show, edit, and delete buttons -->
									<td>

										<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
										<!-- we will add this later since its a little more complicated than the other two buttons -->

										<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
										<!--<a class="btn btn-small btn-success" href="{{ URL::to('orphans/' . $value->id) }}">Show this Orphans</a>-->

										<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
										<a class="btn btn-small btn-info" href="{{ URL::to('orphans/' . $value->id . '/edit') }}">تحرير</a>

										{{ Form::open(array('url' => 'orphans/' . $value->id, 'class' => 'pull-right')) }}
											{{ Form::hidden('_method', 'DELETE') }}
											{{ Form::submit('حذف', array('class' => 'btn btn-warning')) }}
										{{ Form::close() }}
										
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>						
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection