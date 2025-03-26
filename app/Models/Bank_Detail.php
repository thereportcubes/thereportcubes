<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_Detail extends Model
{
    use HasFactory;
	public $timestamps = false;
    protected $table =  "bank_details";
}
