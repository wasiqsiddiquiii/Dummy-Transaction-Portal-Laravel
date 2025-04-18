@extends('dashboard.user.template')

   @section('title','Add Beneficiary | User')

   @section('main')

        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add New Beneficiary </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Account Summary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add New Beneficiary</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  @if(session('success'))<span style="background-color:#c8ffc8; color:green;padding:6px 12px;margin-bottom:10px;">{{session('success')}}</span>@endif
                  @if(session('failed'))<span style="background-color:#c8ffc8; color:red;padding:6px 12px;margin-bottom:10px;">{{session('failed')}}</span>@endif
                    
                  
                    <h4 class="card-title" style="margin-top:1rem;">Add Beneficiary</h4>
                    <p class="card-description">Before transaction you've to add the beneficiary first</p>
                    <form class="forms-sample" action="add_beneficiary" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{auth()->user()->id}}" />
                      <div class="form-group">
                        <label for="exampleInputUsername1">Account Name</label>
                      <input type="text" class="form-control" name="acc_name" id="exampleInputUsername1"    />
                    @error('acc_name')  <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Account Number</label>
                        <input type="number" class="form-control" name="acc_number" id="exampleInputEmail1"   />
                        @error('acc_number')  <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Bank Name</label>
                        <input type="text" class="form-control" name="bank_name" id="exampleInputPassword1"   />
                        @error('bank_name')  <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Routine Number</label>
                        <input type="text" step="any" class="form-control" name="routing_number" id="exampleInputEmail1"   />
                        @error('routine')  <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Swift Code</label>
                        <input type="text" step="any" class="form-control" name="swift_code" id="exampleInputEmail1"   />
                        @error('swift_code')  <span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      
                      <input type="submit"  class="btn me-2"  style="background-color:green; color:white; width:100%;" value="Add Beneficiary"/>
                      
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          
   @endsection