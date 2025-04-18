
@extends('dashboard.admin.template')
   @section('title','Transaction Approval | Admin')

   @section('main')


      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Transaction Approval </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Transaction Approval</li>
              </ol>
            </nav>
          </div>
          <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="overflow-x:auto;">
                @if(session('success'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                @if(session('rejected'))    <span style="background-color:#ffe2e2; color:red;padding:6px 12px;">{{session('rejected')}}</span> @endif
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







                      </tr>
                    </thead>
                    <tbody>
                  

  @foreach($data as $x)
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





                    </tbody>
                  </table>
                </div>
              </div>
            </div>


          </div>
        </div>

   @endsection