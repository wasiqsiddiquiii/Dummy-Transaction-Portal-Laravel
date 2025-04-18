@extends('dashboard.admin.template')
   @section('title','Edit User | Admin')

   @section('main')
 
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Edit Users</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Users
                <li>
              </ol>
            </nav>
          </div>
          <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Users<h4>
                      <p class="card-description"> List of<code>Users</code>created by<code>Administrator</code>
                      </p>
                      <table class="table table-bordered table-striped">
                        <thead>
                          <form action="edituser" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"  />
                     

                          <tr>
                          @foreach($data as $x)   <th> User ID</th>
                            <th> <input type="text"  name="id" class="form-control" style="border:1px solid green; background-color:#e9ecef;" value="{{$x->id}}" readonly />
                            </th>
                          </tr>
                          <tr>
                            <th> Full Name</th>
                            <th><input type="text" name="name" class="form-control" value="{{$x->name}}" style="border:1px solid green;"></th>
                          </tr>
                          <tr>
                            <th> Email Address</th>
                            <th><input type="email"  name="email" class="form-control" value="{{$x->email}}" style="border:1px solid green;"></th>
                          </tr>
                          <tr>
                            <th> Password</th>
                            <th><input type="password"  name="password" class="form-control" placeholder="Enter New Password or Remains empty" style="border:1px solid green;"></th>
                          </tr>
                          <tr>
                            <th> Current Balance</th>
                            <th><input type="text" name="balance" class="form-control" value="{{$x->balance}}" style="border:1px solid green;" disabled></th>

                          </tr>@endforeach
                          <tr>

                            <th> Edit User </th>
                            <th><input type="submit" class="btn btn-fw" style="background-color: green; color:white;" value="Update"/>
                            </th>


                          </tr>
                          </form>
                        </thead>
                        <tbody>







                        </tbody>
                      </table>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

   @endsection