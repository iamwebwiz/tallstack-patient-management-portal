<div class="px-10 py-5">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-semibold uppercase">Blood Pressure Readings</h1>
        <a href="{{ route('patients.readings.create', $patient->id) }}" class="bg-indigo-600 text-indigo-50 uppercase px-5 py-2 rounded shadow">New Entry</a>
    </div>

    <x-alert />

    <livewire:patient-blood-pressure-readings-table />
</div>
