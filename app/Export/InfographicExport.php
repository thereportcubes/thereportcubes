<?php
namespace App\Export;
use App\Models\Infographic;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class InfographicExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Infographic::select('title','industry','slug','report_link','seo_title','seo_keyword','seo_description','infographic_order','status','created_at')->get();
    }

    public function headings(): array
        {
            return ["Title","Industry","Slug","Report_link","Seo Title","Seo Keyword","Seo Description","Infographic Order","Status","Created Date"];
        }
}



