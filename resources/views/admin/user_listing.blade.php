@extends('layouts.admin_master')


@section('title')
	User Listing
@endsection

@section('user_model')
<div class="modal fade" id="userModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title"> Add User </h4>
        </div>
        <div class="modal-body">
          <form name="form" method="post" action="{{ action('AdminController@userData') }}" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	          	<div class="form-group">
			      	<label for="user_first_name">First Name:</label>			             
			        <input type="text" name="user_first_name" class="form-control" id="user_first_name" placeholder="Enter user_first_name">
			        <p>  {{ $errors->first('user_first_name') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="user_last_name">Last Name:</label>			             
			       	<input type="text" name="user_last_name" class="form-control" id="user_last_name" placeholder="Enter user_last_name">
			       	<p>  {{ $errors->first('user_last_name') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="user_email">User Email:</label>			             
			        <input type="user_email" name="user_email" class="form-control" placeholder="Enter user_email">
			        <p>  {{ $errors->first('user_email') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="user_mobile">User Mobile:</label>			             
			       	<input type="text" name="user_mobile" class="form-control" id="user_mobile" placeholder="Enter user_mobile">
			       	<p>  {{ $errors->first('user_mobile') }} 	</p>
			    </div>

			    <div class="modal-footer">
			        <input type="submit" name="submit" value="Save User" class="btn blue-hoki">
			        <button type="button" class="btn blue-hoki" data-dismiss="modal">Close</button>
			    </div>			    
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')

	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="dashboard">Home</a>
						<i class="fa fa-angle-right"></i>
						<span>User Listing</span>
					</li>					
				</ul>				
			</div>	
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">

							<div class="caption">
								<i class="fa fa-globe"></i> User Listing
							</div>
							<div class="tools">

							</div>
						</div>						
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
								<div>								
									<a href="javascript:;">	
										<button class="btn blue-hoki" data-toggle="modal" data-target="#userModal" type="button" style="margin-bottom: 1%;"><i class="fa fa-plus"> </i>  Add User 
										</button>
									</a>
									<a href=" {{ url('pdfusers') }} ">	
										<button class="btn blue-hoki" style="margin-bottom: 1%;"> <i class="fa fa-download"> </i> PDF File </button>
									</a>
								</div>							
								<tr>
									<th> Id </th>
						            <th> First Name </th>
						            <th> Last Name </th>
						            <th> User Email </th>						            
						            <th> User Mobile </th>
						            <th> Delete </th>
						            <th> Edit </th>
								</tr>
							</thead>
								<?php $a = 1; ?>
								@foreach($user_data as $rows)
								<tbody>
									<tr>
										<td> {{ $a }} </td>
										<td> {{ $rows->user_first_name }} </td>
										<td> {{ $rows->user_last_name }} </td>
										<td> {{ $rows->user_email }} </td>
										<td> {{ $rows->user_mobile }} </td>
										<td> <a href="{{ url('/deleteUser')}}/{{ $rows->user_id }} "> Delete </a> </td>
										<td> <a href="{{ url('/adminEditUser1') }}/{{$rows->user_id }}"> Edit </a> </td>
									</tr>								
							    </tbody>
							    <?php $a++; ?> 
							    @endforeach
							</table>
							 <div class="pagination"> {{ $user_data->links() }} </div>
						 </div>						
					</div>
				</div>				
			</div>
		</div>	
	</div>
@endsection


