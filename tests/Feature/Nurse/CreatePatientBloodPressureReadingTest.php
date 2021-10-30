<?php

namespace Tests\Feature\Nurse;

use App\Http\Livewire\Nurse\CreateNewBloodPressureEntry;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreatePatientBloodPressureReadingTest extends TestCase
{
    use RefreshDatabase;

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
}
