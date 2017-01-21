
@extends('layouts.parent')

@section('title')
   $title;
@endsection

@section('content')
  <table class="table table-striped table-condensed quotation_table" style="border:1px solid">
        <thead>
          <tr>
             <th> User Id </th>
             <th> First name </th>
             <th> Last Name </th>
             <th> User Email </th> 
             <th> User Mobile </th> 
             <th> User Image </th> 
          </tr>
        </thead>
        <tbody>
          @foreach($product as $row)
          <tr>
              <td> {{ $row->user_id }} </td>
              <td> {{ $row->user_first_name }} </td>
              <td> {{ $row->user_last_name }} </td>
              <td> {{ $row->user_email }} </td>
              <td> {{ $row->user_mobile }} </td>
              <td> {{ $row->user_image }} </td>
         </tr>
         @endforeach
    </tbody>
</table>
@endsection