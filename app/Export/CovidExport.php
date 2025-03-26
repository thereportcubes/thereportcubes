<?php
namespace App\Export;
use App\Models\Sample_Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CovidExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sample_Request::where('report_type_request','=','covid')->select('full_name','company_name','degingnation','busniess_email','contact_number','country','message','email_from','email_to','report_title','created_date_time')->get();
    }

    public function headings(): array
        {
            return ["Full Name","Company Name","Designation","Business Email","Contact Number","Country","Message","Email From","Email To","Report Title","Created Date Time"];
        }
}