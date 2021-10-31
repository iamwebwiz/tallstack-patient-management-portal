<?php

namespace Tests\Feature\Nurse;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class PatientsExportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_nurse_can_export_all_patients_to_csv()
    {
        Excel::fake();

        $this->actingAs(User::factory()->create(['role' => 'nurse']))
            ->get(route('patients.export'));

        Excel::assertDownloaded('patients.csv');
    }
}
