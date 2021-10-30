<?php

namespace Tests\Feature\Nurse;

use App\Http\Livewire\Nurse\CreateNewBloodPressureEntry;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreatePatientBloodPressureReadingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_nurse_can_view_page_to_create_new_blood_pressure_entry()
    {
        $user = User::factory()->create(['role' => 'nurse']);
        $patient = Patient::factory()->create();

        $this->actingAs($user);

        $this->get(route('patients.readings.create', $patient->id))
            ->assertSuccessful()
            ->assertSeeText('New Blood Pressure Reading')
            ->assertSeeLivewire(CreateNewBloodPressureEntry::class);
    }

    /** @test */
    public function valid_data_must_be_sent_for_processing()
    {
        Livewire::actingAs(User::factory()->create(['role' => 'nurse']))
            ->test(CreateNewBloodPressureEntry::class, ['patient' => Patient::factory()->create()])
            ->call('submit')
            ->assertHasErrors([
                'diastolic' => 'required',
                'systolic' => 'required',
                'pulsePressure' => 'required',
            ]);
    }

    /** @test */
    public function a_nurse_can_add_new_blood_pressure_reading_for_patient()
    {
        $patient = Patient::factory()->create();

        $this->assertDatabaseCount('patient_blood_pressures', 0);

        Livewire::actingAs(User::factory()->create(['role' => 'nurse']))
            ->test(CreateNewBloodPressureEntry::class, ['patient' => $patient])
            ->set('diastolic', $this->faker->randomNumber(3))
            ->set('systolic', $this->faker->randomNumber(3))
            ->set('pulsePressure', $this->faker->randomNumber())
            ->call('submit')
            ->assertRedirect(route('patients.readings', $patient->id));

        $this->assertDatabaseCount('patient_blood_pressures', 1);
    }
}
