@extends('dashboard.user.template')

   @section('title','Dashboard | User')

   @section('main')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Profile Details </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Account Summary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <h4 class="card-title" style="margin-top:1rem;">Profile Details</h4>
                    <p class="card-description">Personal Info </p>
                    <form class="forms-sample" action="" method="post">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Full Name</label>
                     @if(auth()->check()) <input type="text" class="form-control" name="name" id="exampleInputUsername1" value="{{auth()->user()->name}}" style="color:grey;"  disabled>@endif
                      
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        @if(auth()->check())  <input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{auth()->user()->email}}" style="color:grey;"  disabled> @endif
                        
                      </div>
                   
                     
                      
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
       
@endsection