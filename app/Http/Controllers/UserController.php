<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beneficiary;
use App\Models\Transaction;
use Carbon\Carbon;


class UserController extends Controller
{
    //
    function add_beneficiary(Request $request)
    {
        
        $request->validate([
            'acc_name' => 'required',
            'acc_number' => 'required|min:10|max:10',
            'bank_name' => 'required',
            'routing_number' => 'required',
            'swift_code' => 'required',
            

        ]);
          
            $bene = Beneficiary::create([
                'account_name' => $request->acc_name,
                'account_number' => $request->acc_number,
                'bank_name' => $request->bank_name,
                'routing_number' => $request->routing_number,
                'swift_code' => $request->swift_code,
                'user_id' => $request->id,



            ]);

            if($bene)
            {
                return redirect()->route('add_beneficiary')->with('success','Beneficiary Created | Waiting For Admins Approval');
            }
            else{
                return redirect()->route('add_beneficiary')->with('failed','Beneficiary Not Created');
            }

      
    }

    function view_beneficiary()
    {
         $bene = Beneficiary::where('user_id', auth()->user()->id)->get();

        return view('dashboard.user.bene_list',['data' => $bene]);
    }
    function delete_benelist($id)
    {
        $bene = Beneficiary::destroy($id);
        return redirect()->route('bene_list')->with('success','Beneficiary Has Been Deleted');
    }


    function fund_transfer()
    {
        $bene = Beneficiary::where('status','Approved')->where('user_id',auth()->user()->id)->get();
        return view('dashboard.user.fund_transfer',['data' => $bene]);
    }

   function makePayment(Request $request)
   {

    $request->validate([
        'beneficiary' => 'required',
        'amount' => 'required',
        'pref' => 'required',

    ]);

        $user = User::find(auth()->user()->id);
        
            if($user->balance < $request->amount  )
            {
                return redirect()->route('fund_transfer')->withErrors(['failed'=> 'Insufficient Balance']);
            }
            else{
                
                    $user->balance = $user->balance - $request->amount;
                    $user->save();
                    $trans = Transaction::create([
                        'transaction_type' => 'debit',
                        'transaction_amount' => $request->amount,
                        'transaction_status' => 'Successful',
                        'sender_id' => $user->id,
                        'beneficiary_id' => $request->beneficiary,
                        'p_ref' => $request->pref,

                    ]);

                    

                    return redirect()->route('fund_transfer')->with('success','Payment Transfer Successfully');

            }


    
   
}

function fund_transfer_list()
{
    $trans = Transaction::with('beneficiaryrel')->where('sender_id',auth()->user()->id)->get();

    return view('dashboard.user.fund_transfer_list',['data' => $trans]);
}
     

function mini_statement(Request $request)
{
    $fdateTime = $request->f_date;
    $tdateTime = $request->t_date;
    
  
    $fdate = new \DateTime($fdateTime);
    $tdate = new \DateTime($tdateTime);
    
   
    $ffdate = $fdate->format('Y-m-d');
    $ttdate = $tdate->format('Y-m-d');
    
    
    $transactions = Transaction::with('beneficiaryrel')->where('sender_id',auth()->user()->id)->whereBetween('created_at', [$ffdate, $ttdate])->get();


   
    return view('dashboard.user.mini_statement', ['data' => $transactions]);
   
}


function dashboard()
{

    $carbon =  new Carbon();

    $month_start = $carbon->now()->startOfMonth();
    $month_end = $carbon->now()->endOfMonth();
    $available_balance = User::where('id',auth()->user()->id)->whereBetween('created_at',[$month_start,$month_end])->value('balance');
   $deposited = Transaction::where('reciever_id',auth()->user()->id)->where('transaction_type','credit')->whereBetween('created_at',[$month_start,$month_end])->sum('transaction_amount');
   $withdrawl = Transaction::where('sender_id',auth()->user()->id)->where('transaction_type','debit')->whereBetween('created_at',[$month_start,$month_end])->sum('transaction_amount');

    return view('dashboard.user.dashboard',['ab'=> $available_balance, 'dep'=> $deposited, 'wd' => $withdrawl]);

}

}
