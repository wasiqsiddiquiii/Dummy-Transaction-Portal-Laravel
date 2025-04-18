<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toggle extends Model
{
    use HasFactory;
    
    
    protected $table = 'toggle';  // If your table is named 'toggle'
    protected $fillable = ['toggle_type']; // Only fill the toggle_type
}
