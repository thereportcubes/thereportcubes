<?php
namespace App\Export;
use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ContactExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::select('name','company_name','degingnation','busniess_email','contact_number','country','message','created_date_time')->get();
    }

    public function headings(): array
        {
            return ["Full Name","Company Name","Designation","Business Email","Contact Number","Country","Message","Date Time"];
        }
}