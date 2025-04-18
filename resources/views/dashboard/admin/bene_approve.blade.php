@extends('dashboard.admin.template')
   @section('title','Beneficiary Approval | Admin')

   @section('main')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Beneficiary Approval </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Beneficiary Approval</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                  @if(session('success'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                  @if(session('rejected'))    <span style="background-color:#ffe2e2; color:red;padding:6px 12px;">{{session('rejected')}}</span> @endif
                  
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
                        
                      @foreach($data as $x)

                          <tr>
                            <td>{{$x->id}}</td>
                            <td>{{$x->beneRel->name}}</td>
                            <td>{{$x->account_name}}</td>
                            <td>{{$x->account_number}}</td>
                            <td>{{$x->bank_name}}</td>
                            <td>{{$x->routing_number}}</td>
                            <td>{{$x->swift_code}}</td>
                            <td>{{$x->status}}</td>
                            <td>{{$x->crated_at}}</td>
                        

                                
                                    @if($x->status == 'Pending')

                                    <td> 
                                
                                <a href="{{'approve_bene/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
                                <a href="{{'reject_bene/'.$x->id}}" class="btn btn-fw" style="background-color:red; color:white;" >Reject</a>
                            </td>
                            @endif

                            @if($x->status == 'Rejected')


                                 
                         <td> <a href="{{'approve_bene/'.$x->id}}" class="btn btn-fw" style="background-color:green; color:white;" >Approve</a>
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