<style type="text/css">

	table td, table th{

		border:1px solid black;

	}

</style>

<div class="container">


	<br/>

	<a href="{{ route('pdfusers',['download'=>'pdf']) }}"> Download PDF </a>


	<table>

		<tr>

			<th>No</th>

			<th>First Name</th>

			<th>Last Name</th>

			<th>User Email</th>

			<th>User Mobile</th>

		</tr>

		@foreach ($user_data as $key => $item)

		<tr>

			<td>{{ ++$key }}</td>

			<td>{{ $item->user_first_name }}</td>

			<td>{{ $item->user_last_name }}</td>

			<td>{{ $item->user_email }}</td>

			<td>{{ $item->user_mobile }}</td>

			<!-- <td> <img src="{{ url( asset('assets/image')) }}/{{$item->image}}" width="200" height="80"> </td> -->

		</tr>

		@endforeach

	</table>

</div>