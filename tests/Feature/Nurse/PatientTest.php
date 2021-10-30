<?php

namespace Tests\Feature\Nurse;

use App\Http\Livewire\Nurse\ShowPatients;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_nurse_can_view_the_patients_list_page()
    {
        $user = User::factory()->create();

        $this->be($user);

        $this->get(route('patients.index'))
            ->assertSuccessful()
            ->assertSeeLivewire(ShowPatients::class);

        Livewire::actingAs($user)
            ->test(ShowPatients::class)
            ->assertViewHas('patients')
            ->assertViewIs('livewire.nurse.show-patients');
    }

    /** @test */
    public function a_nurse_can_delete_a_patient_from_the_records()
    {
        $user = User::factory()->create(['role' => 'nurse']);
        $patients = Patient::factory(10)->create();

        $this->assertDatabaseCount('patients', 10);

        $this->actingAs($user)
            ->get(route('patient.delete', $patients[0]->id))
            ->assertSessionHas('info', 'Deleted patient successfully')
            ->assertRedirect();

        $this->assertDatabaseCount('patients', 9);
    }
}
