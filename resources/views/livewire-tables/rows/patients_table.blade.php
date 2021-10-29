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
    {{ strtoupper($row->created_at->format('d F Y')) }}
</x-livewire-tables::table.cell>

<x-livewire-tables::table.cell>
    <div class="flex justify-around space-x-2">
        <a href="{{ route('patients.show', $row->id) }}" class="bg-blue-800 text-blue-50 px-3 py-1 rounded">View BP records</a>
        <a href="{{ route('patient.delete', $row->id) }}" class="bg-red-800 text-red-50 px-3 py-1 rounded">Delete</a>
    </div>
</x-livewire-tables::table.cell>
