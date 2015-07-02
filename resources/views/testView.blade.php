@extends('app')
@section('content')


	{!! Form::open(['action' => 'testController@show', 'method' => 'post','id'=>'testForm']) !!}
	{!! Form::select('clientx', $clients , null , ['class' => 'form-control']) !!}
	{!! Form::submit('Submit', ['class' => 'form-control']) !!}
	{!! Form::close() !!}
@endsection