@if (session('success'))
    <div class="bg-green-100 text-green-800 font-semibold px-5 py-2 rounded mb-5">
        {{ session('success') }}
    </div>
@endif

@if (session('info'))
    <div class="bg-blue-100 text-blue-800 font-semibold px-5 py-2 rounded mb-5">
        {{ session('info') }}
    </div>
@endif

@if (session('danger'))
    <div class="bg-red-100 text-red-800 font-semibold px-5 py-2 rounded mb-5">
        {{ session('danger') }}
    </div>
@endif
