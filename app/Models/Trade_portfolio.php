<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade_portfolio extends Model
{
    use HasFactory;
	public $timestamps = false;
    protected  $table = "trade_portfolio";
}
