<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PatientBloodPressure;

class PatientBloodPressureReadingsTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('Diastolic')->sortable()->searchable(),
            Column::make('Systolic')->sortable()->searchable(),
            Column::make('Pulse Pressure')->sortable()->searchable(),
            Column::make('Entry Date', 'created_at')->sortable()->format(function ($value) {
                return strtoupper(Carbon::parse($value)->format('d F Y'));
            }),
        ];
    }

    public function query(): Builder
    {
        return PatientBloodPressure::query();
    }
}
