
@extends('layouts.parent')
@parent
@section('content')

{{ $errors->user_first_name }}
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif


	{!! Form::open(array('url' => 'editUserData','method' => 'post')) !!}
	
		{{ csrf_field() }}

		{!! Form::hidden('user_id', $user_data->user_id)  !!} </br>

		{!! Form::label('firstname', ' First Name'), Form::text('user_first_name', $user_data->user_first_name)  !!} </br>

		{!! Form::label('lastname', ' Last Name  '), Form::text('user_last_name', $user_data->user_last_name)  !!} </br>

		{!! Form::label('lastname', 'User Email '), Form::email('user_email', $user_data->user_email)  !!} </br>

		{!! Form::label('lastname', 'User Mobile'), Form::text('user_mobile', $user_data->user_mobile)  !!} </br>		

		{!! Form::submit('Submit')  !!}		

	{!! Form::close() !!}

@endsection






