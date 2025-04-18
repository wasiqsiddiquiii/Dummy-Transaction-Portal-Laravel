
@extends('dashboard.admin.template')
   @section('title','User List | Admin')

   @section('main')
  
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> User List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">User List</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                  @if(session('success'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                    <h4 class="card-title">User List</h4>
                    <p class="card-description"> List of<code>Users</code>created by<code>Administrator</code>
                    </p>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th> Serial # </th>
                          <th> Username </th>
                          <th> Email Address</th>
                          <th> Current Balance</th>
                          <th> Action </th>
                         
                         
                        </tr>
                      </thead>
                      <tbody>
                   
                        @foreach($data as $x)

                        <tr>
                       <td>{{$x->id}}</td>
                        <td>{{$x->name}}</td>
                        <td>{{$x->email}}</td>
                        <td>{{"$".$x->balance}}</td>
                        <td>                <td><a href="{{'add_money/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >ADD MONEY</a>
                         
                         <a href="{{'edit_user/'.$x->id}}" class="btn btn-fw" style="background-color:black; color:white;">Edit User</a>
                        
                         <a href="{{'delete_user/'.$x->id}}" class="btn btn-fw" style="background-color:red; color:white;" onclick="return confirm('Are you sure you want to delete this user?');">Delete User</a></td></td>
</tr>
                        
                          
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
        
        
       
   @endsection