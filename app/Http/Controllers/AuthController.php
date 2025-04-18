<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    function signup(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if($user)
        {
            return "Registered Successfully";
        }
        else{
            return "Not Registered";
        }

    }

    function login(Request $request)
    {
        $request->validate([

            'email' => 'email|required',
            'password' => 'required',

        ]);
        
        $request['email']= strtolower($request->email);
        $check_auth = $request->only('email','password');
        $user = User::where('email',$request->email)->first();

        if(!$user)
        {
            return redirect()->route('login')->withErrors(['err'=>'Email Not Found']);
        }
        else{

            if(Auth::attempt($check_auth))
            {
                if(auth()->user()->role === "admin")
                {
                    return redirect()->route('admindashboard');
                }

                else{
                    
                    return redirect()->route('userdashboard');
                }
              
            }
            else{
                return redirect()->route('login')->withErrors(['err'=>'Incorrect Password']);
            }


        }
        
    }

    function logout(Request $request)
    {
        Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login')->with('status', 'You have been logged out.');
    }

}
