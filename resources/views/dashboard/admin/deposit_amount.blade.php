
@extends('dashboard.admin.template')
   @section('title','Deposit Amount | Admin')

   @section('main')
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Deposit Amount </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">View Transactions</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                    <h4 class="card-title">Transactions List</h4>
                    <p class="card-description"> List of<code>Transactions</code>performed by<code>Administrator</code>
                    </p>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                            <th>Serial No</th>
                        <th> Transaction Date</th>
                          <th> Sent By </th>
                          <th> Recieved By </th>
                          <th> Transaction Amount</th>
                          <th> Transaction Status </th>
                
 
                          
                          
                          
                         
                         
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $x)
                      <tr>
                <td>{{$x->id}}</td>
                <td>{{$x->created_at}}</td>
                <td>{{auth()->user()->name}}</td>
                <td>{{$x->recieveruser->name}}</td>
                <td>{{"$".$x->transaction_amount}}</td>
                <td>{{$x->transaction_status}}</td>

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