@extends('layouts.master')

@section('content')
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="
	    margin-top: 2%; margin-left: 52px;" > Add Gallery </button>
	@parent
	@endsection

	@section('gallery')
	@foreach($gallery_data as $rows)
	<div class="row_{{ $rows->id }}">
		<div class="col-lg-4 col-md-4 col-sm-6">
			<a href="{{ asset('assets/image') }}/{{$rows->image}}" class="fh5co-project-item image-popup">
				<figure>
					<div class="overlay"><i class="ti-plus"></i></div>
					<img src="{{ asset('assets/image') }}/{{$rows->image}}" alt="Image" class="img-responsive">
				</figure>
				<div class="fh5co-text">
					<h2> {{ $rows->title }} </h2>
					<p> {{ $rows->description }} </p>
				</div>
			</a>
		</div>
	</div>

@endforeach
<center>
	<div class="pagination"> {{ $gallery_data->links() }} </div>	
</center>

@endsection
