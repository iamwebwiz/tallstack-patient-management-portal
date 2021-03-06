<?php

namespace Tests\Feature\Nurse;

use App\Http\Livewire\Nurse\ShowPatientBloodPressureReadings;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientBloodPressureReadingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_nurse_can_view_the_page_for_patient_blood_pressure_readings()
    {
        $user = User::factory()->create(['role' => 'nurse']);
        $patient = Patient::factory()->create();

        $this->actingAs($user);

        $this->get(route('patients.readings', $patient->id))
            ->assertSuccessful()
            ->assertSee('Blood Pressure Readings')
            ->assertSeeLivewire(ShowPatientBloodPressureReadings::class);
    }
}
