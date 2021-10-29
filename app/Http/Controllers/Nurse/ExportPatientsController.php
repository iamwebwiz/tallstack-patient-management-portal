<?php

namespace App\Http\Controllers\Nurse;

use App\Exports\PatientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportPatientsController extends Controller
{
    public function __invoke(): BinaryFileResponse
    {
        return Excel::download(new PatientsExport, 'patients.csv');
    }
}
