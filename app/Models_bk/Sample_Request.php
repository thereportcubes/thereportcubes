<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample_Request extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "report_sample_request"; 
}
