@extends('dashboard.user.template')

   @section('title','Dashboard | User')

   @section('main')

        <div class="main-panel">
          <div class="content-wrapper" style="background-color:#eff7ee;">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home" ></i>
                </span> Account Summary
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>In-Month <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <h4>Checking Account</h4>
              <hr>
              <div class="col-md-12 stretch-card grid-margin" style="background-color:white;">
              <div class="col-md-4 stretch-card grid-margin">
              
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                 
                  <div class="card-body" >
                    
                    <h4 class="font-weight-normal mb-3" style="color:black;">Available Balance <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">{{"$".$ab}}</h2>
                    <h6 class="card-text">Right Now</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
                    <img src="../assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3" style="color:black;" >Deposits this month <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">{{"$".$dep}}</h2>
                    <h6 class="card-text" style="color:black;">In-Month</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
                 
                    <h4 class="font-weight-normal mb-3" style="color:black;">Withdrawl this month <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">{{"$".$wd}}</h2>
                    <h6 class="card-text" style="color:black;">Overall</h6>
                  </div>
                </div>
              </div>
            </div>
</div>
            <div class="row">
              <h4>Credit Card</h4>
              <hr>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
              
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                 
                  <div class="card-body">
                    
                    <h4 class="font-weight-normal mb-3" style="color:black;">Available Balance <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">68,729.10</h2>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3" style="color:black;">VISA ***7363 <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">$1,270.90</h2>
                    <h6 class="card-text" style="color:black;">In-Month</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
                    
                    <h4 class="font-weight-normal mb-3" style="color:black;">Withdrawl this month <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">$0.00</h2>
                    <h6 class="card-text" style="color:black;">In-Month</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <h4>Life Insurance</h4>
              <hr>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
              
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                 
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3" style="color:black;">Payout <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">850,000.00</h2>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
              
                    <h4 class="font-weight-normal mb-3" style="color:black;">Deposits this month <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5" style="color:black;">$73.00</h2>
                    <h6 class="card-text" style="color:black;">In-Month</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin"  style="background-color:white;">
                <div class="card  card-img-holder bg-white" style="background-color:white;">
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3" style="color:black;">Since <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5"  style="color:black;">2006</h2>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
            </div>
            
          
           
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->


   @endsection
   