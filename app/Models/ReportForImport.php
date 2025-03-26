<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportForImport extends Model
{
    use HasFactory;
	protected $table = "reports";
    
    protected $fillable = ['cat_id','sub_cat_id','no_of_page','title','heading2','report_code','created_by','page_url','excel_data_pack','special_excel_data_pack','single_licence_price','multi_user_price','segmentation_alt_tag','custom_report_price','active_inactive','upcomingstatus','special_single_licence_price','special_multi_user_price','rating_value','reviewcount','offer'];

    public $timestamps = false;

}
