<div class="container">
  <table width="60%" cellspacing="0" cellpadding="4" border="0" class="data">
    @foreach($users as $user)
    <tr>
      <td> {{ $user->u_firstname }} </td>
      <td> {{ $user->u_lastname }} </td>
      <td> {{ $user->u_email }} </td>
    </tr>
    @endforeach
  </table>
  <div class="pagination"> {{ $users->links() }} </div>
</div>