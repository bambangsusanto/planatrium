@extends('templates.default')
@section('title', 'Settings')

@section('content')
	<form method="POST" role="form" class="form-horizontal col-md-6 col-md-offset-3">
		{!! csrf_field() !!}

		<legend>Privacy Settings</legend>

		<div class="form-group">
			<label class="control-label col-md-4">Receive newsletter via email?</label>
			<div class="col-md-8">
				<label class="radio-inline">
					<input type="radio" name="option">
						Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="option">
						No
				</label>
			</div>
		</div>

		<div class="button-holder">
			<button type="submit" class="btn btn-primary">Save changes</button>
		</div>

	</form>
@endsection