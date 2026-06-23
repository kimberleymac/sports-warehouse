{{-- Flash messages (temporarily saved to session) --}}
@if (session('success') || session('error') || session('message'))
<div>
    <div class="mt-5">
        {{-- Success --}}
        @if (session('success'))
            <div role="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                ✅{{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if (session('error'))
            <div role="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                ❌{{ session('error') }}
            </div>
        @endif

        {{-- Message --}}
        @if (session('message'))
            <div role="alert" class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                ℹ️{{ session('message') }}
            </div>
        @endif
        
    </div>
</div>
@endif