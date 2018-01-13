
@if ($errors->any()) 
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<li> {{ $error }} </li>
		@endforeach
	</div> 
@endif


@if (session('succses')) 
	<div class="alert alert-success"> 
			<li> {{ session('succses') }} </li> 
	</div> 
@endif


@if (session('error')) 
	<div class="alert alert-danger"> 
			<li> {{ session('error') }} </li> 
	</div> 
@endif