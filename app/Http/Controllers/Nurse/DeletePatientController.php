<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;

class DeletePatientController extends Controller
{
    public function __invoke(int $id): RedirectResponse
    {
        Patient::find($id)->delete();

        return redirect()->back()->with('info', 'Deleted patient successfully');
    }
}
