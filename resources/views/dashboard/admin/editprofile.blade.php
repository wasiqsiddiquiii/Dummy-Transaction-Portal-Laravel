
@extends('dashboard.admin.template')
   @section('title','Edit Profile | Admin')

   @section('main')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Edit Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
              @if(session('success'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                    <h4 class="card-title" style="margin-top:1rem;">Update Profile</h4>
                    <p class="card-description">Personal Info </p>
                    <form class="forms-sample" action="updateadmin/{{Auth::user()->id}}" method="post">
                      @csrf
                    <input type="hidden" name="_method" value="PUT"/>
                
                      <div class="form-group">
                        <label for="exampleInputUsername1">Full Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputUsername1" value="{{Auth::user()->name}}" style="color:grey;" placeholder="Your Name" disabled>
                      <span style="background-color:lightred; color:red; padding:4px 0px;"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{Auth::user()->email}}" style="color:grey;" placeholder="Email" disabled>
                        <span style="background-color:lightred; color:red; padding:4px 0px;"></span>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" style="color:grey;"  placeholder="Password" disabled>
                        <span style="background-color:lightred; color:red; padding:4px 0px;"></span>
                      </div>
                     <button type="button" class="btn btn-light" onclick="enable()" >Edit</button>
                      <input type="submit"  class="btn me-2" name="submit" style="background-color:green; color:white;" value="Update"/>
                      
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         
    <script>

function enable()
{

  document.getElementById('exampleInputUsername1').disabled = false;
    document.getElementById('exampleInputEmail1').disabled = false;
    document.getElementById('exampleInputPassword1').disabled = false;

    document.getElementById('exampleInputUsername1').style.border = "1px solid green";
    document.getElementById('exampleInputEmail1').style.border = "1px solid green";
    document.getElementById('exampleInputPassword1').style.border = "1px solid green";

    document.getElementById('exampleInputUsername1').style.color = "green";
    document.getElementById('exampleInputEmail1').style.color = "green";
    document.getElementById('exampleInputPassword1').style.color = "green";


  

}
</script>
  @endsection