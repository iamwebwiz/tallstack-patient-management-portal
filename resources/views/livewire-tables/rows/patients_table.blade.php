<x-livewire-tables::table.cell>
{{ strtoupper($row->name) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ strtoupper($row->email) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->phone }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ strtoupper($row->gender) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ strtoupper($row->location) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->blood_group }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->genotype }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    {{ $row->created_at->format('d/m/y') }}
</x-livewire-tables::table.cell>
