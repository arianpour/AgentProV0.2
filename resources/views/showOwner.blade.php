@extends('app')
@section('content')
	<h1>{{ $owner->firstName }} {{$owner->lastName}}</h1>

	<p>IC / Passport No: {{ $owner->idNumber }} </p>
	<p>Email: {{ $owner->email }} </p>
	<p>Nationality: {{ $owner->nationality }} </p>
	<p>Phone No: {{ $owner->phoneNo }} </p>
	@foreach($address as $item)

		<p>Unit: {{$item->unit}}</p>
		<p>Street: {{$item->street}}</p>
		<p>City: {{$item->city}}</p>
		<p>State: {{$item->state}}</p>
		<p>post Code: {{$item->postCode}}</p>
		<p>Country: {{$item->country}}</p>
		<hr>
	@endforeach

	@foreach($bankDetails as $item)

		<p>Bank Name: {{$item->bankName}}</p>
		<p>Account Number: {{$item->accountNo}}</p>

		<hr>
	@endforeach

	<a href="{{ action('OwnerController@index') }}" class="btn btn-info">Back to all Owner</a>
	<a href="{{ action('OwnerController@edit', $owner->id) }}" class="btn btn-primary">Edit Owner Details</a>
	<a href="{{ action('AddressController@edit', $owner->id) }}" class="btn btn-primary">Edit Address</a>
	<a href="{{ action('BankDetailController@edit', $owner->id) }}" class="btn btn-primary">Edit Bank Details</a>
	<div class="pull-right">
		<a href="{{action('OwnerController@destroy',$owner->id)}}" class="btn btn-danger">Delete this Owner</a>
	</div>
@endsection