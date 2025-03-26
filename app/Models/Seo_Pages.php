<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo_Pages extends Model
{
    use HasFactory;
    protected  $table = "seo_content";
    public $timestamps = false;
}
