<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    public $table = "beneficiary";
    use HasFactory;

    protected $fillable = [
        'account_name',
        'account_number',
        'bank_name',
        'routing_number', // <-- ADD THIS
        'swift_code',
        'user_id'
    ];
   

    function setAccountNameAttribute($val)
    {
       return $this->attributes['account_name'] = strtoupper($val);
    }
    function setBankNameAttribute($val)
    {
        return $this->attributes['bank_name'] = strtoupper($val);

    }
    function setSwiftCodeAttribute($val)
    {
        return $this->attributes['swift_code'] = strtoupper($val);
    }


//Relations
    function beneRel()
    {
        return $this->belongsTo('\App\Models\User','user_id');
    }
    function manyTrans()
    {
        return $this->hasMany('\App\Models\Transaction');
    }
}
