
@extends('dashboard.admin.template')
   @section('title','Reset Portal | Admin')

   @section('main')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Reset Portal </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Reset Portal</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
              
                    <h4 class="card-title" style="margin-top:1rem;">Reset Your Portal</h4>
                    <p class="card-description">All The Transactions, Beneficiaries & Users Will Be Delete</p>
                  <a href="{{route('resetnow')}}">  <button type="button" class="btn me-2" style="background-color:green; color:white;" onclick="return confirm('Are you sure you want to reset this portal?');" >Reset </button></a>
                 
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
         

  @endsection