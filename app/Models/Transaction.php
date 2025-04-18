<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
       
        'transaction_type',
        'transaction_amount',
        'transaction_status',
        'sender_id',
        'reciever_id',
        'beneficiary_id',
        'p_ref'

    ];
    use HasFactory;

    function senderuser()
    {
        return $this->belongsTo('\App\Models\User','sender_id');
    }
    function recieveruser()
    {
        return $this->belongsTo('\App\Models\User','reciever_id');
    }
    function beneficiaryrel()
    {
        return $this->belongsTo('\App\Models\Beneficiary','beneficiary_id');
    }
    
}
