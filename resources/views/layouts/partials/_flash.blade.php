{{-- Flash messages (temporarily saved to session) --}}
@if (session('success') || session('error') || session('message'))
<div>
    <div>
        {{-- Success --}}
        @if (session('success'))
            <div class="success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error --}}
        @if (session('error'))
            <div class="error" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Message --}}
        @if (session('message'))
            <div class="message" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
    </div>
</div>
@endif