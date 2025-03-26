<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_order extends Model
{
    use HasFactory;
    
    protected $table = "my_order"; 
    public $timestamps = false;
}
