<?php

namespace App\Http\Livewire\Nurse;

use App\Models\Patient;
use Livewire\Component;

class CreatePatient extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $gender = '';
    public string $location = '';
    public string $bloodGroup = '';
    public string $genotype = '';

    public array $rules = [
        'name' => ['required', 'string', 'min:6'],
        'email' => ['required', 'string', 'email', 'unique:patients'],
        'phone' => ['required', 'string', 'unique:patients'],
        'gender' => ['required', 'string'],
        'location' => ['required', 'string'],
        'bloodGroup' => ['required'],
        'genotype' => ['required']
    ];

    public function submit()
    {
        $this->validate();

        Patient::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'location' => $this->location,
            'blood_group' => $this->bloodGroup,
            'genotype' => $this->genotype,
        ]);

        return redirect()->route('patients.index')->withSuccess('Patient record added');
    }

    public function render()
    {
        return view('livewire.nurse.create-patient');
    }
}
