@extends('dashboard.user.template')

   @section('title','Mini Statement | User')

   @section('main')


        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Mini Statements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Account Summary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Mini Statements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                    <h4 class="card-title">Statement</h4>
                    <p class="card-description"> List of<code>Transactions</code>performed by<code>You</code>
                    </p>
                    <form class="forms-sample" action="mini_statement" method="POST" style="padding-bottom:1.5rem;" >
  @csrf
                    <label for="f_date">From Date</label>
                    <input  type="date" name="f_date" id="f_date" style="padding:0.5rem; color:grey; border-radius:4px; border:1px solid grey;" />
                    <label for="t_date">To Date</label>
                    <input  type="date" name="t_date" id="t_date" style="padding:0.5rem; color:grey; border-radius:4px; border:1px solid grey;">
                    <input  type="submit" value="Search" style="background-color:green; color:white; padding:0.5rem 0.5rem; border:1px solid green; border-radius:4px;" >
                    </form>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>Serial No</th>
                        <th> Transaction Date</th>
                          <th> Account Name </th>
                          <th> Account Number </th>
                          <th>Bank Name</th>
                          <th> Transaction Amount</th>
                          <th> Transaction Status </th>
                          <th> Payment Refernece </th>
                          
 
                          
                          
                          
                         
                         
                        </tr>
                      </thead>
                      <tbody>
                        @if($data)
                      @foreach($data as $x)
                          <tr>
                          <td>{{$x->id}}</td>
                          <td>{{$x->created_at}}</td>
                        <td>{{$x->beneficiaryrel->account_name}}</td>
                        <td>{{$x->beneficiaryrel->account_number}}</td>
                        <td>{{$x->beneficiaryrel->bank_name}}</td>
                        <td>{{"$".$x->transaction_amount}}</td>
                        <td>{{$x->transaction_status}}</td>
                          <td>{{$x->p_ref}}</td>
                          
                        </tr>

@endforeach
@endif


                   

                          
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


            </div>
          </div>
      
   @endsection