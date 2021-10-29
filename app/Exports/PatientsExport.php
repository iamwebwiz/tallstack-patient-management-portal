<?php

namespace App\Exports;

use App\Models\Patient;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function headings(): array
    {
        return [
            '#',
            'NAME',
            'EMAIL',
            'PHONE',
            'GENDER',
            'LOCATION',
            'BLOOD GROUP',
            'GENOTYPE',
            'DATE ADDED',
        ];
    }

    public function collection()
    {
        return Patient::all();
    }
}
