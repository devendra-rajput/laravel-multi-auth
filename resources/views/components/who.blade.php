@if(Auth::guard('user')->check())
	<p class="text-success">
		You are logged in as a <strong>USER !</strong>
	</p>
@else
	<p class="text-danger">
		You are logged out as a <strong>USER !</strong>
	</p>
@endif


@if(Auth::guard('admin')->check())
	<p class="text-success">
		You are logged in as a <strong>ADMIN !</strong>
	</p>
@else
	<p class="text-danger">
		You are logged out as a <strong>ADMIN !</strong>
	</p>
@endif

@if(Auth::guard('associate')->check())
	<p class="text-success">
		You are logged in as a <strong>ASSOCIATE !</strong>
	</p>
@else
	<p class="text-danger">
		You are logged out as a <strong>ASSOCIATE !</strong>
	</p>
@endif