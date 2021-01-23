<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)    
    <tr>      
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        <button class="btn btn-primary">Edit</button>
        <button class="btn btn-danger">Delete</button>
      </td>
    </tr>  
    @endforeach      
  </tbody>
</table>