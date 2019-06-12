<!DOCTYPE html>
<html>
	<head>
		<title>Todo List</title>
		<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<style>
			.task-head{text-align : center;margin : 30px}
			.task-head-green{color:#080;}
			.task-head-red{color:#F00;}
		</style>
	</head>
	<body>
		<div style="position: absolute;top: 20px;right:5px;" class="col-md-2 pull-right">
			@if(auth()->check())
				<a style="margin:0 10px;letter-spacing: 1px" href="#">{{ auth()->user()->name }}</a>		
				<a style="margin:0 10px;letter-spacing: 1px" href="{{ url('auth/logout') }}">Logout</a>		
			@else
				@if(!Request::is('auth/login'))
					<a style="margin:0 10px;letter-spacing: 1px" href="{{ url('auth/login') }}">login</a>
				@endif
				@if(!Request::is('auth/register'))
					<a style="margin:0 10px;letter-spacing: 1px" href="{{ url('auth/register') }}">register</a>
				@endif
			@endif
		</div>
		@yield('content')
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>