<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sample_Request extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "report_sample_request"; 
    //public function getCreatedDateTimeAttribute($value){
       // return Carbon::parse($value)->format('d-m-Y');
    //}
}
