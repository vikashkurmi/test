<!DOCTYPE html>
<html>
<head>
  <title>Laravel custom pagination template</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <style type="text/css">
    .my-active span{
      background-color: #5cb85c !important;
      color: white !important;
      border-color: #5cb85c !important;
    }
  </style>

  
</head>
<body>

<div class="container">

  <h1 class="text-primary"> Customize pagination </h1>

  <table class="table table-bordered">
    <thead>
      <th>Id</th>
      <th>Name</th>
      <th>Creation Date</th>
      <th>Updated Date</th>
    </thead>
    <tbody>
      @foreach($data as $key => $tag)
        <tr>
          <td>{{ ++$key }}</td>
          <td>{{ $tag->name }}</td>
          <td>{{ $tag->created_at }}</td>
          <td>{{ $tag->updated_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{ $data->links() }}

</body>
</html>