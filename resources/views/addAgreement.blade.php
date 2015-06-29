@extends('app')
@section('content')
	<h1>Add new Agreement</h1>

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



	{!! Form::open(['action' => 'RentalAgreementController@store', 'method' => 'post']) !!}

	{!! Form::label('tenant', 'Tenant', ['class' => 'control-label']) !!}
	{!! Form::select('tenant', {{$clientList->firstname}} , 1 , ['class' => 'field']) !!}

	{!! Form::label('dateOfAgreement', 'Date Of Agreement', ['class' => 'control-label']) !!}
	{!! Form::input('dateOfAgreement', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}

	{!! Form::label('commencingDate', 'commencing Date', ['class' => 'control-label']) !!}
	{!! Form::input('commencingDate', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}

	{!! Form::label('expireDate', 'expire Date', ['class' => 'control-label']) !!}
	{!! Form::input('expireDate', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date']) !!}

	{!! Form::label('rentalAmount', 'rental Amount', ['class' => 'control-label']) !!}
	{!! Form::text('rentalAmount', '', ['class' => 'field']) !!}

	{!! Form::label('rentalDeposit', 'rental Deposit', ['class' => 'control-label']) !!}
	{!! Form::text('rentalDeposit', '', ['class' => 'field']) !!}

	{!! Form::label('utilitiesDeposit', 'utilities Deposit', ['class' => 'control-label']) !!}
	{!! Form::text('utilitiesDeposit', '', ['class' => 'field']) !!}

	{!! Form::label('otherDeposit', 'other Deposit', ['class' => 'control-label']) !!}
	{!! Form::text('otherDeposit', '', ['class' => 'field']) !!}

	{!! Form::label('premiseUse', 'premise Use', ['class' => 'control-label']) !!}
	{!! Form::text('premiseUse', '', ['class' => 'field']) !!}

	{!! Form::submit('Submit', ['class' => 'button']) !!}

	{!! Form::close() !!}


@endsection