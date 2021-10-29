<?php

namespace App\Http\Livewire\Nurse;

use App\Models\Patient;
use Livewire\Component;

class ShowPatients extends Component
{
    public function render()
    {
        $patients = Patient::all();

        return view('livewire.nurse.show-patients', compact('patients'));
    }
}
