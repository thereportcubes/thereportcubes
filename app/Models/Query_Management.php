<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query_Management extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "query_management"; 
}
