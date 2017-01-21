@extends('layouts.master')

@section('model')

  <div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Add Gallery </h4>
        </div>
        <div class="modal-body">
          <form name="form" method="post" action="ImageData" enctype="multipart/form-data">
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
			        <input type="submit" name="submit" value="Upload File" class="btn btn-danger">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			    </div>			    
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection