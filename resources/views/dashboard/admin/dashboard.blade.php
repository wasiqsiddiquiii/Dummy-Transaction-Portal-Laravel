
   @extends('dashboard.admin.template')
   @section('title','Dashboard | Admin')

   @section('main')
   <div class="main-panel">
          <div class="content-wrapper" style="background-color:#f0f6e4;">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home" ></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Transferred Amount <i class="mdi mdi-chart-line mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{"$".$total_credit }}</h2>
                    <h6 class="card-text">In-Month</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total User Transactions <i class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{"$".$total_debit }}</h2>
                    <h6 class="card-text">In-Month</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Number Of Users <i class="mdi mdi-diamond mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{$users}}</h2>
                    <h6 class="card-text">Overall</h6>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
           
                <div class="card-body" style="overflow-x:auto;">
                @if(session('transsuccess'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('transsuccess')}}</span> @endif
                @if(session('transrejected'))    <span style="background-color:#ffe2e2; color:red;padding:6px 12px;">{{session('transrejected')}}</span> @endif
                        <h4 class="card-title">Transactions Approval</h4>
                  <p class="card-description"> Waiting<code>for Administrator</code>Approval</code>
                  </p>
                 
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Serial No</th>
                        <th> Transaction Date</th>
                        <th>Username</th>
                        <th> Account Name </th>
                        <th> Account Number </th>

                        <th> Amount</th>
                        <th> Status </th>
                        <th> Payment Refernece </th>
                        <th>Action</th>




  @foreach($transaction_approval as $x)
            <tr>
          <td>{{$x->id}}</td>
          <td>{{$x->created_at}}</td>
          <td>{{$x->senderuser->name}}</td>
          <td>{{$x->beneficiaryrel->account_name}}</td>
          
          <td>{{$x->beneficiaryrel->account_number}}</td>
          <td>{{"$".$x->transaction_amount}}</td>
          <td>{{$x->transaction_status}}</td>
          <td>{{$x->p_ref}}</td>
          
          @if($x->transaction_status == 'Pending')

<td> 

<a href="{{'dash_approve_trans/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
<a href="{{'dash_reject_trans/'.$x->id}}" class="btn btn-fw" style="background-color:red; color:white;" >Reject</a>
</td>
@endif

@if($x->transaction_status == 'Rejected')



<td> <a href="{{'dash_approve_trans/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
</td>
@endif
          

            </tr>
  @endforeach
                     
                    </thead>
                    <tbody>
                      

                      <tr>
                       




                      </tr>



                      




                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                  @if(session('benesuccess'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('benesuccess')}}</span> @endif
                  @if(session('benerejected'))    <span style="background-color:#ffe2e2; color:red;padding:6px 12px;">{{session('benerejected')}}</span> @endif
                    <h4 class="card-title">Beneficiary Approval</h4>
                    <p class="card-description"> These<code>Beneficiaries</code>are waiting for your<code>Approval</code>
                    </p>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th> Serial # </th>
                          <th> Username </th>
                          <th> Account Name </th>
                          <th> Account Number</th>
                          <th> Bank Name</th>
                          <th> Routing Number </th>
                          <th> Swift Code </th>
                          <th> Status </th>
                          <th> Date </th>
                          
                          <th> Action </th>
                          
                         
                         
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach($bene as $x)

<tr>
  <td>{{$x->id}}</td>
  <td>{{$x->beneRel->name}}</td>
  <td>{{$x->account_name}}</td>
  <td>{{$x->account_number}}</td>
  <td>{{$x->bank_name}}</td>
  <td>{{$x->routing_number}}</td>
  <td>{{$x->swift_code}}</td>
  <td>{{$x->status}}</td>
  <td>{{$x->created_at}}</td>


      
          @if($x->status == 'Pending')

          <td> 
      
      <a href="{{'dash_approve_bene/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
      <a href="{{'dash_reject_bene/'.$x->id}}" class="btn btn-fw" style="background-color:red; color:white;" >Reject</a>
  </td>
  @endif

  @if($x->status == 'Rejected')


       
<td> <a href="{{'dash_approve_bene/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
</td>
@endif





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
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
