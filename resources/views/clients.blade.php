@extends('app')
@section('content')

	@if(isset($clientList))
		@foreach($clientList as $client)
		<a href={{action('ClientController@show',$client->id)}}>
			<ul>
				{{$client->firstName}} {{$client->lastName}}
			</ul>
		</a>
	@endforeach
	@else
	<h1> No client added yet</h1>
	@endif

@endsection