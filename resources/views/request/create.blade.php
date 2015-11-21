@extends('templates.default')
@section('title', 'Request')

@section('content')

	<div class="container">
		<form method="POST" role="form" class="form-horizontal">
			@foreach ($errors->all() as $error)
				<p class="alert alert-warning">{{ $error }}</p>
			@endforeach

			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>

			@endif

			{!! csrf_field() !!}

			<legend>Request</legend>

			<h4>Building</h4>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="type" class="control-label col-sm-4">Type of building</label>
							<div class="col-sm-8">
								<select name="type" id="type" class="form-control">
									<option value="invalid">-- Select One --</option>
									<option value="residential">Residential</option>
									<option value="commercial">Commercial</option>
									<option value="educational">Educational</option>
									<option value="industrial">Industrial</option>
									<option value="government">Government</option>
									<option value="religious">Religious</option>
									<option value="parking">Parking structures and storage</option>
									<option value="other">Other</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="type_spec" class="control-label col-sm-4">Specify Type</label>
							<div class="col-sm-8">
								<input type="text" id="type_spec" value="{{ old('type_spec') }}" name="type_spec" class="form-control" aria-describedby="help-block-spec" placeholder="e.g. apartment block, library, shopping mall, etc" />
								<span id="help-block-spec" class="help-block"><em>Specify your type of building</em></span>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-sm-4">Size of land</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-xs-3">
										<input type="text" id="size_width" value="{{ old('size_width') }}" name="size_width" class="form-control">
									</div>
									<div class="col-xs-1 align-vertical">
										<label class="control-label">x</label>
									</div>
									<div class="col-xs-3">
										<input type="text" id="size_length" value="{{ old('size_length') }}" name="size_length" class="form-control">
									</div>
									<div class="col-xs-5">
										<select name="measurement" id="measurement" class="form-control">
											<option value="meters">meters</option>
											<option value="feet">feet</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="type_info" class="control-label col-sm-4">Additional information</label>
							<div class="col-sm-8">
								<textarea class="form-control" type="text" id="type_info" name="type_info" value="{{ old('type_info') }}" aria-describedby="help-block-info" rows="4"></textarea>
								<span class="help-block" id="help-block-info"><em>Provide additional information/specifications for requested building (height, building style, etc)</em></span>
							</div>
						</div>
					</div>
				</div>

				<hr />

				<div class="row">
					<h4>Preffered location</h4>
					<div class="col-md-6">
						<div class="form-group">
							<label for="country" class="control-label col-sm-4">Country</label>
							<div class="col-sm-8">
								@include('templates.country')
							</div>
						</div>

						<div class="form-group">
							<label for="location_info" class="control-label col-sm-4">Additional location information</label>
							<div class="col-sm-8">
								<textarea class="form-control" rows="4" name="location_info" id="location_info" aria-describedby="help-block-location"></textarea>
								<p class="help-block" id="help-block-location"><em>Provide the specific location (state, city, address) you wish to base your building.</em></p>
							</div>
						</div>
					</div>
				</div>

				<hr />

				<div class="row">
					<h4>Provide contact information</h4>
					<p class="help-block"><em>Provide your contact information so prospective designer can keep in touch with you.</em></p>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email" class="control-label col-sm-4">Email address</label>
								<div class="col-sm-8">
									<input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email address" class="form-control">
								</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="phone" class="control-label col-sm-4">Phone</label>
								<div class="col-sm-8">
									<input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="e.g. +10987654321" class="form-control">
								</div>
						</div>
					</div>
				</div>


			<div class="button-holder">
				<button type="submit" class="btn btn-primary">Make request</button>
			</div>

		</form>
	</div>
@endsection