@extends('dashboard.admin.template')
   @section('title','Beneficiary List | Admin')

   @section('main')

      <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Beneficiary List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Beneficiary List</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              
              
             
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" style="overflow-x:auto;">
                  @if(session('success'))    <span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                    <h4 class="card-title">Beneficiary List</h4>
                    <p class="card-description"> List of<code>Beneficiary</code>created by<code>Users</code>
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
                            <td>{{$x->created_at}}</td>
                            

                         <td> <a href="{{'delete_beneficiary/'.$x->id}}" class="btn btn-fw" style="background-color:red; color:white;" onclick="return confirm('Are you sure you want to delete this beneficiary?');">Delete</a></td>
                          
                          
                          
                          
                          
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