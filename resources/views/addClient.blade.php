@extends('app')
@section('content')
	<h1>Add new Client</h1>

	<hr/>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


	{!! Form::open(['action' => 'ClientController@store', 'method' => 'post']) !!}
	{!! Form::label('firstName', 'First Name', ['class' => 'control-label']) !!}
	{!! Form::text('firstName', '', ['class' => 'field']) !!}
	{!! Form::label('LastName', 'LastName', ['class' => 'control-label']) !!}
	{!! Form::text('lastName', '', ['class' => 'field']) !!}
	{!! Form::label('idNumber', 'IC/ passport No', ['class' => 'control-label']) !!}
	{!! Form::text('idNumber', '', ['class' => 'field']) !!}
	{!! Form::label('Nationality', 'Nationality', ['class' => 'control-label']) !!}
	{!! Form::select('nationality', ['Malaysia','Singapore'] , 1 , ['class' => 'field']) !!}
	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection