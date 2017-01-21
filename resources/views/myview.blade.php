@extends('layouts.master')

@section('content')
@
<h1> Test Laravel HTML Form </h1>

   @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['url' => 'registrationData1', 'method' => 'post']) !!}

{!! Form::label('firstname', 'User First Name'), Form::text('user_first_name')  !!} </br>

{!! Form::label('lastname', 'User Last Name'), Form::text('user_last_name')  !!} </br>

{!! Form::label('lastname', 'User Email'), Form::email('user_email')  !!} </br>

{!! Form::label('lastname', 'User Mobile '), Form::text('user_mobile')  !!} </br>

< {!! Form::label('lastname', 'User Last Name'), Form::select('gender', ['male'=>'Male', 'female'=>'Female'])  !!} </br>

{!! Form::label('password', 'User Password'), Form::password('user_password')  !!} </br>

{!! Form::submit('Submit')  !!}

{!! Form::close() !!}


@endsection