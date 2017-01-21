@extends('layouts.admin_master')

@section('title')
	Edit Gallery
@endsection

@section('edit_gallery')
	<div class="page-content-wrapper">
		<div class="page-content">

			<form name="form" method="post" action="{{ action('AdminController@updateGalleryData') }}" enctype="multipart/form-data">
	          	{{ csrf_field() }}
	          	<div class="form-group">
			        <input type="hidden" name="id" value="{{ $gallery_data->id }}" class="form-control">			       
			    </div>
			    <div class="col-sm-7">
		          	<div class="form-group">
				      	<label for="title">Title:</label>			             
				        <input type="text" name="title" value="{{ $gallery_data->title }} " class="form-control" id="title" placeholder="Enter title">
				        <p>  {{ $errors->first('title') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				      	<label for="description">Description:</label>			             
				       	<input type="text" name="description" value="{{ $gallery_data->description }} " class="form-control" id="description" placeholder="Enter description">
				       	<p>  {{ $errors->first('description') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				      	<label for="file">Select file:</label>			             
				        <input type="file" name="file" value="{{ $gallery_data->file }} " class="form-control" placeholder="Enter file">
				        <p>  {{ $errors->first('file') }} 	</p>
				    </div>
			    </div>
			    <div class="col-sm-7">
				    <div class="form-group">
				        <input type="submit" name="submit" value="Update Gallery" class="btn blue-hoki">
				    </div>
			    </div>		    
          </form>
        </div>
    </div>

@endsection