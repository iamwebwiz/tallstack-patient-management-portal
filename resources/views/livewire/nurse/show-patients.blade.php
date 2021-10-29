<div class="px-10 py-5">
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-semibold uppercase">All Patients</h1>
        <div class="flex space-x-2">
            <a href="{{ route('patients.export') }}" class="bg-gray-700 text-gray-50 uppercase px-5 py-2 rounded">Export Patients</a>
            <a href="{{ route('patients.create') }}" class="bg-indigo-600 text-indigo-50 uppercase px-5 py-2 rounded shadow">Create new Patient</a>
        </div>
    </div>

    <x-alert />

    <livewire:patients-table />
</div>
