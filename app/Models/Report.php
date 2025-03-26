<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
	//protected $table = "reports";
    //protected $fillable = ['cat_id','sub_cat_id','no_of_page','title','heading2','created_by','page_url'];
    public $timestamps = false;
}
