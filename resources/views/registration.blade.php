placeholder<html>
<head>
	<title>App Name - @yield('title')</title>
</head>
<body>
	Hello.{{ $name }}

	Hello, {!! $name !!}.

  Hello, @{{ $name }}.

	@section('sidebar')
        @show

 <!-- {{ print_r($data) }} -->


   @foreach ($data as $data)

      <div> {{ $data }} </div>

  @endforeach


	<form name="form" action="registration" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
		<input type="text" name="user_first_name" placeholder="user_first_name" /> </br>
		<input type="text" name="user_last_name" placeholder="user_last_name" /> </br>
		<input type="email" name="user_email" placeholder="user_email" /> </br>
		<input type="text" name="user_mobile" placeholder="user_mobile" /> </br>
		<input type="password" name="user_password" placeholder="user_password" /> </br>
    <input type="file" name="image"/> </br>
		<input type="submit" name="submit" value="submit" />
	</form>
	<div class="container">
        @yield('content')
    </div>
</body>
</html>



<!-- <div class="secure">Register form</div>
{!! Form::open(array('url'=>'blogpost/store','method'=>'POST')) !!}
<div class="control-group">
  <div class="controls">
  {!! Form::text('user_first_name','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your First Name')) !!}
  @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Email')) !!}
  @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  AGE : - {!! Form::select('age', array('' => 'Click to select', '20' => '20 years'),array('class'=>'form-control span6')) !!}
  @if ($errors->has('age'))<p style="color:red;">{!!$errors->first('age')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
  @if ($errors->has('password'))<p style="color:red;">{!!$errors->first('password')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('cpassword',array('class'=>'form-control span6', 'placeholder' => 'Confirm your Password')) !!}
  @if ($errors->has('cpassword'))<p style="color:red;">{!!$errors->first('cpassword')!!}</p>@endif
  </div>
</div>
<div id="success"> </div>
{!! Form::submit('Register', array('class'=>'')) !!}
<br />
{!! Form::close() !!}
</div> -->