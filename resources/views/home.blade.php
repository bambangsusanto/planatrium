@extends('templates.default')
@section('title', 'HOME')

@section('content')
	<div class="jumbotron">
		<div class="text-center">
			<h1>Plan Atrium</h1>
			<p>Build your dream building with the help from your best local architect and designer</p>
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<h2>Showroom</h2>
			<p>Explore the big variety of design</p>
			<p>
				<a class="btn btn-primary btn-lg" href="/showroom">Go to Showroom</a>
			</p>
		</div>
	</div>

	<div class="jumbotron">
		<div class="container text-right">
			<h2>Can't find the design you desire?</h2>
			<p>
				<a class="btn btn-primary btn-lg" href="/request">Request for design</a>
			</p>
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<h2>Showcase your work</h2>
			<p>Expose your favorite project to the world</p>
			<p>
				<a class="btn btn-primary btn-lg" href="/auth/login">Sign in</a>
			</p>
		</div>
	</div>
@stop

@section('footer')
@include('templates.footer')
@endsection