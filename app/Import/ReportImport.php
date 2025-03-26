<?php

namespace App\Import;
use App\Models\ReportForImport;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReportImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        //print_r($row); die;
       $report = new ReportForImport([
        'cat_id'                => $row['cat_id'],
        'sub_cat_id'            => $row['sub_cat_id'],
        'title'                 => $row['title'],
        'page_url'              => $row['page_url'],
        'heading2'              => $row['heading2'],
        'created_by'            => '1',
        'no_of_page'            => $row['no_of_pages'],
        'report_code'           => $row['report_code'],
        'excel_data_pack'       => $row['excel_data_pack'],
        'special_excel_data_pack' => $row['special_excel_data_pack'],
        'single_licence_price'    => $row['single_licence_price'],
        'multi_user_price'      => $row['multi_user_price'],
        'segmentation_alt_tag'  => $row['segmentation_alt_tag'],
        'created_date_time'     => date('Y-m-d H:i:s'),
        'custom_report_price'   => $row['custom_report_price'],
        'active_inactive'       => $row['report_status'],
        'upcomingstatus'        => $row['upcoming_status'],
        'report_post_date'      => date('y-m-d'),
        'special_single_licence_price'  => $row['special_single_licence_price'],
        'special_multi_user_price'      => $row['special_multi_user_price'],
        'rating_value'          => $row['rating_value'],
        'reviewcount'           => $row['reviewcount'],
        'offer'                 => $row['offer'],
       ]);
      
       return $report;
    }
    
    // private $setStartRow = 1;
   
    // public function setStartRow($setStartRow){
    //     $this->setStartRow = $setStartRow;
    // }

    // public function startRow() : int{
    //     return $setStartRow;
    // }

}