
@extends('dashboard.admin.template')
   @section('title','Add User | Admin')

   @section('main')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add New User </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add New User</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                 
                    <h4 class="card-title" style="margin-top:1rem;">Create New User</h4>
                    <p class="card-description">Create the credentials of the new user</p>
                    @if(session('success'))<span style="background-color:#c8ffc8; color:green;padding:6px 12px;margin-bottom:10px;">{{session('success')}}</span>@endif
                    
                    <form class="forms-sample" action="add_user" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Full Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputUsername1"  style="color:grey;" placeholder="Enter Full Name" />
                     @error('name') <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                    
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"  style="color:grey;" placeholder="Enter Email Address" />
                        @error('email') <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" style="color:grey;"  placeholder="Password" />
                        <span onclick="copied()" id="spann" style="position:absolute; right:45px; text-decoration:underline; cursor:pointer; color:green;">Copy Password</span>
                        @error('password') <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      
                        <input type="hidden" step="any" class="form-control" name="balance" id="exampleInputEmail1" value="0.00"  style="color:grey;" placeholder="Enter Opening Balance" />
       
                      
                      <input type="submit"  class="btn me-2" name="submit" style="background-color:green; color:white;" value="Add User"/>
                      
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <script>
    function copied()
    {
        var copyField = document.getElementById('exampleInputPassword1');
        var originalType = copyField.type;  

        copyField.type = "text";
        copyField.focus();
        copyField.select();
        copyField.setSelectionRange(0,99999);
        document.execCommand('copy');
        copyField.type = originalType;

        document.getElementById('spann').innerHTML = "Copied";




    }

</script>
         @endsection