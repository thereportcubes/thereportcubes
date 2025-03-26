<?php
namespace App\Export;
use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ReportExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Report::select('title','heading2','reports.page_url','category.cat_name','sub_category.sub_cat_name','no_of_page','report_code','single_licence_price', 'special_single_licence_price', 'multi_user_price', 'special_multi_user_price', 'custom_report_price', 'special_custom_report_price', 'excel_data_pack', 'special_excel_data_pack','report_post_date','active_inactive','upcomingstatus', 'segmentation_alt_tag', 'schema_desc', 'reviewcount', 'rating_value', 'seo_content.seo_title', 'seo_content.seo_description','segmentaion', 'seo_content.seo_key_words' )
        ->leftJoin('category','reports.cat_id','=','category.id')
        ->leftJoin('sub_category','reports.sub_cat_id','=','sub_category.id')
        ->leftJoin('seo_content','reports.id', '=','seo_content.parent_id')
        ->where('seo_content.page_type', '=','report')
        //->orderBy('reports.id','DESC')
        ->distinct('seo_content.parent_id')
        // ->join('category','category.id','=','reports.cat_id')
        // ->join('sub_category','sub_category.id','=','reports.sub_cat_id')
        // ->join('seo_content','seo_content.parent_id', '=','reports.id')
        // ->where('seo_content.page_type', '=','report')
        // ->distinct('seo_content.parent_id')
        //->where('seo_content.parent_id', '=','reports.id')
       
        ->get();
    }

    public function headings(): array
        {
            return ["Title","Heading","Page URL", "Category", "Sub-Category", "No. of Pages","Report Code","Single Licence Price", "Special Single License Price", "Group license Price", "Special Group License Price", "Enterprise License Price", "Special Enterprise License Price", "Excel Data Pack", "Special Excel Data Pack", "Report Post Date", "Report Status", "Upcoming Report", "Segmentation Alt Tag", "Schema Description", "Review Count", "Rating Value", "Seo Title", "Seo Description","Segmentation Image", "Seo Key Words"];
        }
}



