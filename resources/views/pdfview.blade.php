<style type="text/css">

	table td, table th{

		border:1px solid black;

	}

</style>

<div class="container">


	<br/>

	<a href="{{ route('pdfview',['download'=>'pdf']) }}"> Download PDF </a>


	<table>

		<tr>

			<th>No</th>

			<th>Title</th>

			<th>Description</th>

			<!-- <th>Image </th> -->

		</tr>

		@foreach ($items as $key => $item)

		<tr>

			<td>{{ ++$key }}</td>

			<td>{{ $item->title }}</td>

			<td>{{ $item->description }}</td>

			<!-- <td> <img src="{{ url( asset('assets/image')) }}/{{$item->image}}" width="200" height="80"> </td> -->

		</tr>

		@endforeach

	</table>

</div>