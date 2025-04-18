@extends('dashboard.admin.template')
   @section('title','Transfer Amount | Admin')

   @section('main')
   
   

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Send Money</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Send Money
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
                          <form action="transfersuccess" method="post">
                          @csrf
                            <!-- <th> User ID</th> -->
                           
                            <input type="hidden" name="_method" value="PUT" />
                            @foreach($data as $x) 
                            <input type="hidden"  name="id" class="form-control" style="border:1px solid green; background-color:#e9ecef;" value="{{$x->id}}" readonly />
                            
                          
                          <tr>
                            <th> Full Name</th>
                            <th><input type="text" name="name" class="form-control" value="{{$x->name}}" style="border:1px solid green; background-color:#e9ecef;" readonly></th>
                          </tr>
                          <tr>
                            <th> Email Address</th>
                            <th><input type="email"  name="email" class="form-control" value="{{$x->email}}" style="border:1px solid green;" disabled></th>
                          </tr>

                          <tr>
                            <th> Current Balance</th>
                            <th><input type="text" name="balance" class="form-control" value="{{$x->balance}}" style="border:1px solid green; background-color:#e9ecef;" readonly></th>

                          </tr>
                          <tr>
                            <th> Amount To Add</th>
                            <th><input type="text" name="newbalance" class="form-control" placeholder="Enter Amount" style="border:1px solid green;" ></th>

                          </tr>
                          <tr>

                            <th> Action </th>
                            <th><input type="submit" class="btn btn-fw" style="background-color: green; color:white;" value="Transfer Amount"/>
                            </th>
@endforeach

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
     
   @endsection