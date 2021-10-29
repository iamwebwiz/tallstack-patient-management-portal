<?php

namespace App\Http\Livewire\Nurse;

use App\Models\Patient;
use App\Models\PatientBloodPressure;
use Livewire\Component;

class CreateNewBloodPressureEntry extends Component
{
    public Patient $patient;

    public string $systolic = '';
    public string $diastolic = '';
    public string $pulsePressure = '';

    public array $rules = [
        'systolic' => ['required'],
        'diastolic' => ['required'],
        'pulsePressure' => ['required'],
    ];

    public function mount(Patient $patient)
    {
        $this->patient = $patient;
    }

    public function submit()
    {
        $this->validate();

        $reading = new PatientBloodPressure([
            'diastolic' => $this->diastolic,
            'systolic' => $this->systolic,
            'pulse_pressure' => $this->pulsePressure,
        ]);

        $this->patient->bloodPressureReadings()->save($reading);

        return redirect()->route('patients.readings', $this->patient->id)->with('success', 'Blood Pressure record added');
    }

    public function render()
    {
        return view('livewire.nurse.create-new-blood-pressure-entry');
    }
}
