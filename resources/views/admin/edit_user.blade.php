@extends('layouts.admin_master')

@section('title')
	Edit User
@endsection

@section('edit_user')
	<div class="page-content-wrapper">
		<div class="page-content">

			<form name="form" method="post" action="{{ action('AdminController@updateUserData') }}" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	          	<div class="form-group">
			        <input type="hidden" name="user_id" value="{{ $user_data->user_id }}" class="form-control" id="user_first_name" placeholder="Enter user_first_name">			       
			    </div>
			    <div class="col-sm-7">
		          	<div class="form-group">
				      	<label for="user_first_name">First Name:</label>			             
				        <input type="text" name="user_first_name" value="{{ $user_data->user_first_name }} " class="form-control" id="user_first_name" placeholder="Enter user_first_name">
				        <p>  {{ $errors->first('user_first_name') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				      	<label for="user_last_name">Last Name:</label>			             
				       	<input type="text" name="user_last_name" value="{{ $user_data->user_last_name }} " class="form-control" id="user_last_name" placeholder="Enter user_last_name">
				       	<p>  {{ $errors->first('user_last_name') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				      	<label for="user_email">User Email:</label>			             
				        <input type="email" name="user_email" value="{{ $user_data->user_email }} " class="form-control" placeholder="Enter user_email">
				        <p>  {{ $errors->first('user_email') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				      	<label for="user_mobile">User Mobile:</label>			             
				       	<input type="text" name="user_mobile" value="{{ $user_data->user_mobile }} " class="form-control" id="user_mobile" placeholder="Enter user_mobile">
				       	<p>  {{ $errors->first('user_mobile') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				        <input type="submit" name="submit" value="Update User" class="btn blue-hoki">
				    </div>
			    </div>		    
          </form>
        </div>
    </div>

@endsection