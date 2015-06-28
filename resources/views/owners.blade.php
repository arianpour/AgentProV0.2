@extends('app')
@section('content')


	@if(!$clientList->isEmpty())

		@foreach($clientList as $client)
			<a href={{action('OwnerController@show',$client->id)}}>
				<ul>
					{{$client->firstName}} {{$client->lastName}}
				</ul>
			</a>
		@endforeach
	@else
		<h1> No Owner added yet</h1>
	@endif

@endsection