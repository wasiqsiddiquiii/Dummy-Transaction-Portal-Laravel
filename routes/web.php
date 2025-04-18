<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ToggleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('login','index')->name('login');
Route::post('login',[AuthController::class,'login']);
Route::view('signup',[AuthController::class,'signup']);
Route::post('signup',[AuthController::class,'signup']);
Route::view('user/dashboard','dashboard.user.dashboard')->name('userdashboard');
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => "role:admin"],function(){


    Route::get('dashboard',[AdminController::class,'dashboard'])->name('admindashboard');
    Route::get('editprofile',[AdminController::class,'editprofile'])->name('editprofile');
    Route::put('updateadmin/{id}',[AdminController::class,'updateadmin']);
    Route::get('add_user',[AdminController::class,'add_user'])->name('add_user');
    Route::post('add_user',[AdminController::class,'add']);
    Route::get('user_list',[AdminController::class,'user_list'])->name('user_list');
    Route::get('edit_user/{id}',[AdminController::class,'edituser'])->name('edituser');
    Route::put('edit_user/edituser',[AdminController::class,'edituserr']);
    Route::get('add_money/{id}',[AdminController::class,'transfer_amount'])->name('add_money');
    Route::put('add_money/transfersuccess',[AdminController::class,'transfersuccess'])->name('transfersuccess');
    Route::get('delete_user/{id}',[AdminController::class,'delete_user']);
    Route::get('beneficiary_list',[AdminController::class,'bene'])->name('beneficiary_list');
    Route::get('delete_beneficiary/{id}',[AdminController::class,'delete_beneficiary']);
    Route::get('bene_approve',[AdminController::class,'bene_approve'])->name('bene_approve');
    Route::get('approve_bene/{id}',[AdminController::class,'bene_approved']);
    Route::get('reject_bene/{id}',[AdminController::class,'bene_rejected']);
    Route::get('dash_approve_bene/{id}',[AdminController::class,'dash_bene_approved']);
    Route::get('dash_reject_bene/{id}',[AdminController::class,'dash_bene_rejected']);
    Route::get('dash_approve_trans/{id}',[AdminController::class,'dash_trans_approved']);
    Route::get('dash_reject_trans/{id}',[AdminController::class,'dash_trans_rejected']);
    Route::get('approve_trans/{id}',[AdminController::class,'trans_approved']);
    Route::get('reject_trans/{id}',[AdminController::class,'trans_rejected']);
    Route::get('view_transactions',[AdminController::class,'view_transactions'])->name('view_transactions');
    Route::get('deposit_amount',[AdminController::class,'deposit_amount'])->name('deposit_amount');
    Route::get('transaction_approval',[AdminController::class,'transaction_approval'])->name('transaction_approval');
    Route::get('/toggle-status', [ToggleController::class, 'getStatus']);
    Route::post('/toggle-status', [ToggleController::class, 'updateStatus']);
    Route::view('reset','dashboard.admin.reset')->name('reset');
    Route::get('resetnow',[AdminController::class,'resetnow'])->name('resetnow');

});

Route::group(['profix' => 'user', 'middleware' => "role:user"],function(){

    Route::get('dashboard',[UserController::class,'dashboard'])->name('userdashboard');
    Route::view('profile','dashboard.user.profile')->name('profile');
    Route::view('beneficiary','dashboard.user.add_beneficiary')->name('add_beneficiary');
    Route::post('add_beneficiary',[UserController::class,'add_beneficiary']);
    Route::get('benelist',[UserController::class,'view_beneficiary'])->name('bene_list');
    Route::get('delete/benelist/{id}',[UserController::class,'delete_benelist']);
    Route::get('fund_transfers',[UserController::class,'fund_transfer'])->name('fund_transfer');
    Route::post('makepayment',[UserController::class,'makePayment']);
    Route::get('fund_transfer_list',[UserController::class,'fund_transfer_list'])->name('fund_transfer_list');
    
    Route::get('mini_Statement',function(){

        return view('dashboard.user.mini_statement',['data' => '']);
    })->name('mini_statement');

    Route::post('mini_statement',[UserController::class,'mini_statement']);
});
   