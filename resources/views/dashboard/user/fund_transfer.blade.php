@extends('dashboard.user.template')

   @section('title','Fund Transfers| User')

   @section('main')
   <script>
        $(document).ready(function() {
            // Check if successMessage is set
            @if(isset($successMessage))
                // Display the payment popup
                document.getElementById('paymentPopup').style.display = 'block';
            @endif
        });
    </script>
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Fund Transfers </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Account Summary</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Fund Transfers</li>
                </ol>
              </nav>
             
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @error('failed') <span style="background-color:#c8ffc8; color:red;padding:6px 12px;">{{$message}}</span> @enderror
                    @if(session('success'))<span style="background-color:#c8ffc8; color:green;padding:6px 12px;">{{session('success')}}</span> @endif
                    <h4 class="card-title" style="margin-top:1rem;">Fund Transfers</h4>
                    <p class="card-description">Perform Transaction</p>
                    <form class="forms-sample" action="makepayment" method="post">
                        @csrf
                      <div class="form-group">
                        <label for="beneficiary">Beneficiary Select</label>
                        <select class="form-control" name="beneficiary" id="beneficiary" style="color:grey; padding:1rem 1rem;">
                        <option value="">Select Beneficiary</option>
                      @foreach($data as $x) <option value="{{$x->id}}">{{$x->account_name}}</option>@endforeach
                        </select>
                      
                      @error('beneficiary')<span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Amount($)</label>
                        <input type="number" class="form-control" name="amount" id="exampleInputEmail1"   />
                        @error('amount')<span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Payment Reference</label>
                        <input type="text" class="form-control" name="pref" id="exampleInputPassword1"   />
                        @error('pref')<span style="background-color:lightred; color:red; padding:4px 0px;">{{$message}}</span>@enderror
                      </div>
                     
                      
                      <input type="submit"  class="btn me-2" name="submit" style="background-color:green; color:white; width:100%;" value="Proceed"/>
                      
                    </form>
                    <!-- Payment Success Popup -->
                     @if(session('success'))

<div id="paymentPopup" style=" position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:30px; box-shadow:0px 0px 10px gray; text-align:center; border-radius:10px;">
    <img src="{{asset('assets/images/success1.gif')}}" alt="Payment Successful" width="100" height="100"><br>
    <h2></h2>
    <p>Your transaction has been processed.</p>
    <button onclick="document.getElementById('paymentPopup').style.display='none'" style="padding:10px 20px; background:green; color:white; border:none; cursor:pointer;">Close</button>
</div>
@endif
<div id="paymentPopup1" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:30px; box-shadow:0px 0px 10px gray; text-align:center; border-radius:10px;">
    <img src="{{asset('assets/images/success1.gif')}}" alt="Payment Failed" width="100" height="100"><br>
    <h2></h2>
    <p>Your transaction has been processed.</p>
    <button onclick="document.getElementById('paymentPopup1').style.display='none'" style="padding:10px 20px; background:orange; color:white; border:none; cursor:pointer;">Close</button>
</div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
     
   @endsection