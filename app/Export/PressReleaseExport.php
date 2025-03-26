<?php
namespace App\Export;
use App\Models\Press;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PressReleaseExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Press::select('heading','press_release_url','button_refrence','post_date','seo_content.seo_title', 'seo_content.seo_description', 'seo_content.seo_key_words')
                ->where('seo_content.page_type', '=','press_release')
                ->join('seo_content','press_release.id', '=','seo_content.parent_id')
                ->distinct('seo_content.parent_id')
                ->get();
    }

    public function headings(): array
    {
        return ["Heading","Press Release URL","Report Link","Post Title", "Seo Title", "Seo Description", "Seo Key Words"];
    }
}



