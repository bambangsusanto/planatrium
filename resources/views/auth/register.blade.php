@extends('templates.default')
@section('title', 'Register')

@section('content')

<form method="POST" role="form" class="form-horizontal col-md-6 col-md-offset-3">

	@foreach ( $errors->all() as $error )
		<p class="alert alert-danger">{{ $error }}</p>
	@endforeach

	{!! csrf_field() !!}

	<legend>Register</legend>

	<div class="form-group">
		<label for="username" class="has-feedback">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
		<span class="glyphicon form-control-feedback"></span>
	</div>

	<div class="form-group">
		<label for="email" class="has-feedback">Email</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
		<span class="glyphicon form-control-feedback"></span>
	</div>

	<div class="form-group">
		<label for="passowrd" class="has-feedback">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		<span class="glyphicon form-control-feedback"></span>
	</div>

	<div class="form-group">
		<label for="passowrd_confirmation" class="has-feedback">Confirm password</label>
		<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Retype password">
		<span class="glyphicon form-control-feedback"></span>
	</div>

	<div class="button-holder">
		<button type="submit" class="btn btn-primary">Register</button>
	</div>

</form>

@endsection

@section('footer')
@include('templates.footer')
@endsection