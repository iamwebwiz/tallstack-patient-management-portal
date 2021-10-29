<div class="px-10 py-5 w-7/12">
    <h1 class="text-3xl font-semibold uppercase mb-10">Create new patient</h1>

    <form wire:submit.prevent="submit" method="post">
        @csrf
        <div class="mb-5">
            <label for="name" class="block mb-2">Name</label>
            <input type="text" id="name" wire:model="name" placeholder="e.g. John Doe" class="rounded border border-gray-500 w-8/12">
            @error('name') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block mb-2">Email</label>
            <input type="email" id="email" wire:model="email" placeholder="e.g. john@doe.com" class="rounded border border-gray-500 w-8/12">
            @error('email') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="phone" class="block mb-2">Phone</label>
            <input type="tel" id="phone" wire:model="phone" placeholder="Enter patient's phone number" class="rounded border border-gray-500 w-8/12">
            @error('phone') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="gender" class="block mb-2">Gender</label>
            <input type="text" id="gender" wire:model="gender" placeholder="Enter patient's gender" class="rounded border border-gray-500 w-8/12">
            @error('gender') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="location" class="block mb-2">Location</label>
            <input type="text" id="location" wire:model="location" placeholder="Enter patient's location" class="rounded border border-gray-500 w-8/12">
            @error('location') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="bloodGroup" class="block mb-2">Gender</label>
            <input type="text" id="bloodGroup" wire:model="bloodGroup" placeholder="Enter patient's blood group" class="rounded border border-gray-500 w-8/12">
            @error('bloodGroup') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="mb-5">
            <label for="genotype" class="block mb-2">Genotype</label>
            <input type="text" id="genotype" wire:model="genotype" placeholder="Enter patient's genotype" class="rounded border border-gray-500 w-8/12">
            @error('genotype') <span class="text-red-600 font-semibold block mt-1">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-indigo-50 px-5 py-2 mt-5 uppercase rounded">Submit</button>
    </form>
</div>
