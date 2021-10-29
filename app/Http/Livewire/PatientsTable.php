<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Patient;

class PatientsTable extends DataTableComponent
{
    public array $perPageAccepted = [50, 100, 200, 500];

    public function columns(): array
    {
        return [
            Column::make('Name')->sortable()->searchable(),
            Column::make('E-mail', 'email')->sortable()->searchable(),
            Column::make('Phone')->sortable()->searchable(),
            Column::make('Gender')->sortable()->searchable(),
            Column::make('Location')->sortable()->searchable(),
            Column::make('Blood Group', 'blood_group')->sortable()->searchable(),
            Column::make('Genotype')->sortable()->searchable(),
            Column::make('Date Added', 'created_at')->sortable()->searchable(),
        ];
    }

    public function query(): Builder
    {
        return Patient::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.patients_table';
    }
}
