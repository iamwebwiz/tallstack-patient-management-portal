<div class="px-10 py-5 w-7/12">
    <h1 class="text-3xl font-semibold uppercase mb-10">New Blood Pressure Reading</h1>

    <form wire:submit.prevent="submit" method="post">
        @csrf
        <div class="mb-5">
            <label for="diastolic" class="block mb-2">Diastolic</label>
            <input type="number" min="1" id="diastolic" wire:model="diastolic" class="rounded border border-gray-500 w-8/12">
            @error('diastolic') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="systolic" class="block mb-2">Systolic</label>
            <input type="number" min="1" id="systolic" wire:model="systolic" class="rounded border border-gray-500 w-8/12">
            @error('systolic') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="pulsePressure" class="block mb-2">Pulse Pressure</label>
            <input type="number" min="1" id="pulsePressure" wire:model="pulsePressure" class="rounded border border-gray-500 w-8/12">
            @error('pulsePressure') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-indigo-50 px-5 py-2 mt-5 uppercase rounded">Submit</button>
    </form>
</div>
