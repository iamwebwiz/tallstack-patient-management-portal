<?php

namespace App\Http\Livewire\Nurse;

use App\Models\Patient;
use Livewire\Component;

class ShowPatientBloodPressureReadings extends Component
{
    public Patient $patient;

    public function mount(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function render()
    {
        return view('livewire.nurse.show-patient-blood-pressure-readings');
    }
}
