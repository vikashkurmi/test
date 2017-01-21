@extends('layouts.admin_master')

@section('title')
	Gallery Listing
@endsection

@section('galleryModel')

<div class="modal fade" id="galeryModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Gallery </h4>
        </div>
        <div class="modal-body">
          <form name="form" method="post" action="{{ action('AdminController@galleryData') }}" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	          	<div class="form-group">
			      	<label for="title">Title:</label>			             
			        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
			        <p>  {{ $errors->first('title') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="description">Description:</label>			             
			       	<input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
			       	<p>  {{ $errors->first('description') }} 	</p>
			    </div>
			    <div class="form-group">
			      	<label for="file">Browse File:</label>			             
			        <input type="file" name="file" class="form-control" style="display: block;">
			        <p>  {{ $errors->first('file') }} 	</p>
			    </div>
			    <div class="modal-footer">
			        <input type="submit" name="submit" value="Upload File" class="btn blue-hoki">
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
						<span> Gallery Listing </span>
					</li>					
				</ul>				
			</div>

			<!-- Custom Helper Test Function -->
				<?php
					$value = config('app.timezone');
					echo $value."<br/>";
					$password = bcrypt('my-secret-password');
					echo $password."<br/>";  
					echo url()->current()."<br/>";
					echo url()->full()."<br/>";
					echo url()->previous()."<br/>";
					echo str_plural("good")."<br/>";
					echo str_limit("Hello this is testing.", 10 )."<br/>";
					echo snake_case("vikas kurmi")."<br/>";
					echo camel_case("vikas kurmi")."<br/>";
					echo storage_path()."<br/>";
					echo resource_path()."<br/>";
					echo public_path()."<br/>";
					echo database_path()."<br/>";
					echo config_path()."<br/>";
					echo base_path()."<br/>";
					echo app_path()."<br/>";
					echo MyFuncs::test_helper()."<br/>";
					echo "@. This is comman helper function Full Name"." ".MyFuncs::full_name("Vikas","Kurmi");
				?>

			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							
							<div class="caption">
								<i class="fa fa-globe"></i> Gallery Listing
							</div>
							<div class="tools">
								<?php echo trans('messages.messages'); ?>
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
								<div>
									<a href="javascript:;">	
										<button type="button" class="btn blue-hoki" data-toggle="modal" data-target="#galeryModal" style="margin-bottom: 1%;"><i class="fa fa-plus"> </i>  Add Gallery 
										</button>
									</a>
									<a href=" {{ url('pdfview') }} ">	
										<button class="btn blue-hoki" style="margin-bottom: 1%;"> <i class="fa fa-download"> </i> PDF File </button>
									</a>
								</div>							
								<tr>
									<th> Id </th>
						            <th> Title </th>
						            <th> Description </th>
						            <th> Gallery Image </th>						            
						            <th> Delete </th>
						            <th> Edit </th>
								</tr>
							</thead>
								<?php $a = 1; ?>
								@foreach($gallery_data as $rows)
								<tbody>
									<tr>
										<td> {{ $a }} </td>
										<td> {{ $rows->title }} </td>
										<td> {{ $rows->description }} </td>
										<td> <img src="{{ url( asset('assets/image')) }}/{{$rows->image}}" width="100" height="50"> </td>
										<td> <a href="{{ url('/deleteGallery')}}/{{ $rows->id}} "> Delete </a> </td>
										<td> <a href="{{ url('/adminEditGallery')}}/{{ $rows->id }} "> Edit </a> </td>
									</tr>								
							    </tbody>
							    <?php $a++; ?> 
							    @endforeach
							</table>
							 <div class="pagination"> {{ $gallery_data->links() }} </div>
						 </div>
					</div>
				</div>				
			</div>
		</div>	
	</div>
@endsection

@section('javascript')

@endsection