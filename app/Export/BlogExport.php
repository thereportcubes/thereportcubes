<?php
namespace App\Export;
use App\Models\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class BlogExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Blog::select('title','slug','report_link','seo_title','seo_keyword','seo_description','blog_order','status','created_at')->get();
    }

    public function headings(): array
        {
            return ["Title","Slug","Report Link","Seo Title","Seo Keyword","Seo Description","Blog Order","Status","Created Date"];
        }
}



