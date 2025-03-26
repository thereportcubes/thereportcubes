<?php
namespace App\Export;
use App\Models\Sample_Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class FullExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sample_Request::select('full_name','company_name','report_title','degingnation','busniess_email','contact_number','country','message','email_from','email_to')->get();
    }

    public function headings(): array
        {
            return ["Full Name","Company Name","Report Title","Designation","Business Email","Contact Number","Country","Message","Email From","Email To"];
        }
}