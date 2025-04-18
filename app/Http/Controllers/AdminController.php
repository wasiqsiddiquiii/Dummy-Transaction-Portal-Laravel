<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Transaction;
use Carbon\Carbon;


class AdminController extends Controller
{
   //Edit Profile
    function editprofile()
    {
        return view('dashboard.admin.editprofile');
    }

    function updateadmin(Request $request,$id)
    {
       
        $user = User::find($id);

         if(empty($request->password))
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect('admin/editprofile')->with('success','Record Updated Successfully');
        }
        else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('admin/editprofile')->with('success','Record Updated Successfully');

        }
        

    }
    // End Edit Profile

    //Add User

    function add_user()
    {
        return view('dashboard.admin.add_user');
    }

    function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required',

        ]);
       
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'balance' => $request->balance

        ]);
        
        return redirect()->route('add_user')->with('success','User Added Successfully');
    }

    //end add user

    //user_list

    function user_list()
    {
        $user = User::where('role','user')->get();
        return view('dashboard.admin.user_list',['data' => $user]);
    }
    
    function edituser($id)
    {
        $user = User::where('id',$id)->get();
        return view('dashboard.admin.edit_user',['data' => $user]);
    }
    function edituserr(Request $request)
    {
        $request->validate([
            'email' => 'email'
        ]);

        $user= User::find($request->id);
        if(empty($request->password))
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('user_list')->with('success','User Updated Successfully');
        }
        else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user_list')->with('success','User Updated Successfully');
        }
        
      

    }

    function transfer_amount($id)
    {
        $user = User::where('id',$id)->get();
    return view('dashboard.admin.add_money',['data'=> $user]);
    }
    function transfersuccess(Request $request)
    {

        $user = User::find($request->id);
        $user->balance = $user->balance + $request->newbalance;
        $user->save();

        $trans = Transaction::create([


            'transaction_type' => 'credit',
            'transaction_amount' => $request->newbalance,
            'transaction_status' => 'Deposited',
            'sender_id' => auth()->user()->id,
            'reciever_id' => $request->id,

        ]);

        return redirect()->route('user_list')->with('success','Amount Transferred Successfully');
        
    }
    function delete_user($id)
    {
        $user = User::destroy($id);
        
        return redirect()->route('user_list')->with('success','User Deleted Successfully');
        
    }
    //end userlist
    //beneficiary
    function bene()
    {
        $bene = Beneficiary::with('beneRel')->where('status','Approved')->get();
        return view('dashboard.admin.bene_list',['data'=> $bene]);
      
    }

    function delete_beneficiary($id)
    {
        $bene = Beneficiary::destroy($id);
        return redirect()->route('beneficiary_list')->with('success','Beneficiary Deleted Successfully');
    }
    function bene_approve()
    {
        $bene = Beneficiary::with('beneRel')->whereIn('status',['Pending','Rejected'])->get();

        return view('dashboard.admin.bene_approve',['data'=> $bene]);
    }
    function bene_approved($id)
    {
        $bene = Beneficiary::find($id);
        $bene->status = 'Approved';
        $bene->save();


        return redirect()->route('bene_approve')->with('success','Beneficiary Approved Successfully');


    }
    function bene_rejected($id)
    {
        $bene = Beneficiary::find($id);
        $bene->status = 'Rejected';
        $bene->save();


        return redirect()->route('bene_approve')->with('rejected','Beneficiary Rejected Successfully');

    }
    function dashboard()
    {
        
       
        $carbon =  new Carbon();
        $month_start = $carbon->now()->startOfMonth();
        $month_end = $carbon->now()->endOfMonth();
        $total_credit = Transaction::where('transaction_type','credit')->whereBetween('created_at',[$month_start,$month_end]);
        $total_debit = Transaction::where('transaction_type','debit')->whereBetween('created_at',[$month_start,$month_end]);

        $total_credit_in_month = $total_credit->sum('transaction_amount');
        $total_debit_in_month = $total_debit->sum('transaction_amount');
        $users = User::where('role','user')->count();
        $bene = Beneficiary::whereIn('status',['Pending','Rejected'])->get();
        $transactions_approval = Transaction::with(['senderuser','beneficiaryrel'])->whereIn('transaction_status',['Pending','Rejected'])->get();
       

        return view('dashboard.admin.dashboard',['total_debit' => $total_debit_in_month, 'total_credit' =>  $total_credit_in_month, 'users' => $users,'bene' => $bene, 'transaction_approval' => $transactions_approval]);



    }

    function dash_trans_approved($id)
    {
        $bene = Transaction::find($id);
        $bene->transaction_status = 'Successful';
        $bene->save();


        return redirect()->route('admindashboard')->with('transsuccess','Beneficiary Approved Successfully');


    }
    function dash_trans_rejected($id)
    {
        $bene = Transaction::find($id);
        $bene->transaction_status = 'Rejected';
        $bene->save();


        return redirect()->route('admindashboard')->with('transrejected','Beneficiary Rejected Successfully');

    }

    function dash_bene_approved($id)
    {
        $bene = Beneficiary::find($id);
        $bene->status = 'Approved';
        $bene->save();


        return redirect()->route('admindashboard')->with('benesuccess','Beneficiary Approved Successfully');


    }
    function dash_bene_rejected($id)
    {
        $bene = Beneficiary::find($id);
        $bene->status = 'Rejected';
        $bene->save();


        return redirect()->route('admindashboard')->with('benerejected','Beneficiary Rejected Successfully');

    }

    function view_transactions()
    {
        $trans = Transaction::with(['senderuser','beneficiaryrel'])->where('transaction_type', 'debit')->get();
        return view('dashboard.admin.view_transactions',['transactions' => $trans]);
    }

        function deposit_amount()
        {
            $trans = Transaction::with('recieveruser')->where('transaction_type','credit')->get();

            return view('dashboard.admin.deposit_amount',['data' => $trans]);
        }

        function transaction_approval()
        {

            $trans = Transaction::with(['senderuser','beneficiaryrel'])->whereIn('transaction_status', ['Rejected','Pending'])->get();
            return view('dashboard.admin.transaction_approval',['data'=> $trans]);

        }
        function resetnow()
        {
            $transactions = Transaction::query()->delete();
            
            $beneficiary = Beneficiary::query()->delete();
            $users = User::where('role','user')->delete();
            
            
            return redirect()->route('admindashboard');
        }
}

