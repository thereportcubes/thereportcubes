<?php
namespace App\Export;
use App\Models\Sample_Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class TireExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sample_Request::where('report_type_request','Sample Request Tire')->select('full_name','busniess_email','contact_number','country','message','email_from','email_to','report_title','data_type','start_date','end_date','hs_code','country2','created_date_time')->get();
    }

    public function headings(): array
        {
            return ["Full Name","Business Email","Contact Number","Country","Message","Email From","Email To","Report Title","Data Type","Start Date","End Date","Hs Code","Import/Export Country","Created Date Time"];
        }
}