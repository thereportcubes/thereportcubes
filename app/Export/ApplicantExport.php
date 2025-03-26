<?php
namespace App\Export;
use App\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class ApplicantExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Applicant::select('name','email','phone','resume','position_apply_for','Experiance','Location','ctc','notice_period','message','created_date_time')->get();
    }

    public function headings(): array
        {
            return ["Name","Email","Phone","Resume","Position Apply For","Experience","Location","CTC","Notice Period","Message","Creted Date Time"];
        }
}