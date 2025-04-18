
@extends('dashboard.admin.template')
   @section('title','View Transactions | Admin')

   @section('main')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> View Transactions </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashbaord</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Transactions</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                    <h4 class="card-title">Transactions List</h4>
                    <p class="card-description"> List of<code>Transactions</code>performed by<code>Users</code>
                    </p>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>Serial No</th>
                        <th> Transaction Date</th>
                        <th>Username</th>
                          <th> Account Name </th>
                          <th> Account Number </th>
                          <th>Bank Name</th>
                          <th>  Amount</th>
                          <th>  Status </th>
                          <th> Payment Refernece </th>
                          
 
                          
                          
                          
                         
                         
                        </tr>
                      </thead>
                      <tbody>
                       @foreach($transactions as $x)
                          <tr>
                <td>{{$x->id}}</td>
                <td>{{$x->created_at}}</td>
                <td>{{$x->senderuser->name}}</td>
                <td>{{$x->beneficiaryrel->account_name}}</td>
                <td>{{$x->beneficiaryrel->account_number}}</td>
                <td>{{$x->beneficiaryrel->bank_name}}</td>
                <td>{{"$".$x->transaction_amount}}</td>
                <td>{{$x->transaction_status}}</td>
                <td>{{$x->p_ref}}</td>
                



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