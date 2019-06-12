@extends("layouts.app")
@section("content")
	<div  class="text-center" style="margin: 5% 25%">
		<h1 style="margin-bottom:100px;">Register Here</h1>
		{{ Form::open() }}
		<div class="form-group">
			<div class="row">
				<div class="col-md-2 col-md-push-1">
					<label for="task">Name : </label>
				</div>
				<div class="col-md-5 col-md-push-1">
					{{ Form::text('name', null , [ 'class' => 'form-control input-sm' ]) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2 col-md-push-1">
					<label for="task">Email : </label>
				</div>
				<div class="col-md-5 col-md-push-1">
					{{ Form::text('email', null , [ 'class' => 'form-control input-sm' ]) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2 col-md-push-1">
					<label for="task">Password : </label>
				</div>
				<div class="col-md-5 col-md-push-1">
					{{ Form::password('password', [ 'class' => 'form-control input-sm' ]) }}<br>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-5 col-md-push-3">
				{{ Form::submit('Login', [ 'class' => 'form-control btn btn-primary' ]) }}<br>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				@foreach($errors->all() as $error)
					<div class="alert alert-danger">
						{{ $error }}
					</div>
				@endforeach
			</div>
		</div>
	</div>
@stop