    @if ($items->count() === 0)

    <div class="rounded-md border border-gray-200 bg-white p-4 text-gray-600">
        No products in your cart.
    </div>

@else

    <div class="space-y-4">

        @foreach ($items as $item)

            @php
                $unitPrice = $item->salePrice ?? $item->price;
                $lineTotal = $unitPrice * $item->quantity;
            @endphp

            <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white p-4 shadow-sm">

                {{-- Left: Image + Info --}}
                <div class="flex items-center gap-4 w-80">

                    <img
                        src="{{ $item->image_url }}"
                        alt="{{ $item->itemName }}"
                        class="h-32 w-32 rounded-md border border-gray-200 object-contain"
                    >

                    <div>
                        <h3 class="font-large text-gray-900">
                            {{ $item->itemName }}
                        </h3>

                        <p class="product-price">
                            

                        @if ($item->salePrice)
                        {{-- SALE formatting --}}

                        <span class="discounted-price"><ins>{{ $item->sale_price_formatted }}</ins></span>

                        <span class="original-price"><span class="original-price__was">was</span><del
                            class="original-price__del">{{ $item->price_formatted }}</del></span>
                        
                        @else
                        {{-- Normal price formatting --}}
                        <span class="current-price">
                            {{ $item->price_formatted }}
                        </span>

                        
                        @endif
                        
                        </p>
                    </div>

                </div>

                {{-- Middle: Quantity --}}
                <form
                    action="{{ route('products.update-quantity', $item) }}"
                    method="POST"
                    class="flex items-center gap-2"
                >
                    @csrf
                    @method('PUT')

                    <input
                        type="number"
                        name="quantity"
                        value="{{ $item->quantity ?? 1 }}"
                        min="1"
                        class="w-20 rounded-md border-gray-300 text-center"
                        onchange="this.form.submit()"
                    >
                </form>

                {{-- Right: Total + Remove --}}
                <div class="flex items-center gap-4">

                    <span class="w-24 text-right font-medium text-gray-900">
                        ${{ number_format($lineTotal,2) }}
                    </span>

                    <form method="POST" action="{{ route('products.unsave', $item) }}">
                        @csrf
                        <button
                            type="submit"
                            class="overlay__button"
                        >
                            Remove
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    </div>

@endif