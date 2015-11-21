@extends('templates.default')
@section('title', 'Login')

@section('content')

<form action="/login" method="POST" role="form" class="col-md-4 col-md-offset-4">

	{!! csrf_field() !!}

	<legend>Login</legend>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
	</div>

	<div class="form-group">
		<label for="passowrd">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Email Address">
	</div>

	<div class="button-holder">
		<button type="submit" class="btn btn-primary">Login</button>
	</div>

</form>

@endsection