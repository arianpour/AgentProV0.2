@extends('app')
@section('content')

	@if(!$agreementList->isEmpty())
		@foreach($agreementList as $agreement)
			<a href={{action('ClientController@show',$agreement->id)}}>
				<ul>
					{{$agreement->dateOfAgreement}}
				</ul>
			</a>
		@endforeach
	@else
		<h1> No Agreement added yet</h1>
	@endif

@endsection