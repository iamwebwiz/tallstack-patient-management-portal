<?php

namespace Tests\Feature\Nurse;

use App\Http\Livewire\Nurse\CreatePatient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreatePatientTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_nurse_can_view_page_to_create_new_patient()
    {
        $user = User::factory()->create(['role' => 'nurse']);

        $this->actingAs($user)
            ->get(route('patients.create'))
            ->assertSuccessful()
            ->assertSee('Create new patient')
            ->assertSeeLivewire(CreatePatient::class);
    }

    /** @test */
    public function valid_data_must_be_sent()
    {
        Livewire::test(CreatePatient::class)
            ->call('submit')
            ->assertHasErrors([
                'email' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'bloodGroup' => 'required',
                'genotype' => 'required',
            ]);
    }

    /** @test */
    public function a_nurse_can_create_a_new_patient()
    {
        $user = User::factory()->create(['role' => 'nurse']);

        Livewire::actingAs($user)
            ->test(CreatePatient::class)
            ->set('name', $this->faker->name)
            ->set('email', $this->faker->unique()->safeEmail)
            ->set('location', $this->faker->city)
            ->set('phone', $this->faker->phoneNumber)
            ->set('gender', $this->faker->randomElement(['male', 'female']))
            ->set('bloodGroup', 'O')
            ->set('genotype', 'AA')
            ->call('submit')
            ->assertRedirect(route('patients.index'));
    }
}
