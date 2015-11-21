<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">Plan Atrium</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li><a>
				@if (Session::has('info'))
					{{ Session::get('info') }}
				@endif
			</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			@if (Auth::check())
				<li><a href="{{ route('suite') }}">Designer's Suite</a></li>
				<li><a href="{{ route('request_view') }}">View Requests</a></li>
			@else
				<li><a href="{{ route('request') }}">Make Request</a></li>
			@endif
				<li><a href="{{ route('showroom') }}">Showroom</a></li>

			@if(Auth::check())
				<li><a href="/auth/logout">Logout</a></li>
			@else
				<li>@include('templates.login')</li>
				<li><a href="/auth/register">Register</a></li>
			@endif
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>

