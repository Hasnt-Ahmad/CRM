<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Contact::all(['contact_name', 'contact_email', 'phone_number', 'company']);
    }
    public function headings(): array
    {
        return [
            'Contact Name',
            'Contact Email',
            'Phone Number',
            'Company',
        ];
    }
}
