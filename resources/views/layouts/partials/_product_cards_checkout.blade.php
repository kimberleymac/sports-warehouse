<div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">

    <h3 class="mb-6 text-lg font-semibold text-gray-900">
        Order Summary
    </h3>

    @php
        $total  = 0;
    @endphp

    <div class="space-y-4">

        @foreach ($items as $item)

            @php
                $unitPrice = $item->salePrice ?? $item->price;
                $lineTotal = $unitPrice * $item->quantity;
                $total  += $lineTotal;
            @endphp

            <div class="flex items-center gap-4 border-b border-gray-100 pb-4">

                <img
                    src="{{ $item->image_url }}"
                    alt="{{ $item->itemName }}"
                    class="h-16 w-16 rounded-md border object-contain"
                >

                <div class="flex-1">

                    <h4 class="font-medium text-gray-900 line-clamp-2">
                        {{ $item->itemName }}
                    </h4>

                    <p class="text-sm text-gray-500">
                        Qty: {{ $item->quantity }}
                    </p>

                </div>

                <span class="font-medium text-gray-900">
                    ${{ number_format($lineTotal,2) }}
                </span>

            </div>

        @endforeach

    </div>

    {{-- Totals --}}
    <div class="mt-6 space-y-2 border-t border-gray-200 pt-4">

        <div class="flex justify-between text-gray-600">
            <span>Subtotal</span>
            <span>${{ number_format($total,2) }}</span>
        </div>

        <div class="flex justify-between text-gray-600">
            <span>Shipping</span>
            <span>Free</span>
        </div>

        <div class="flex justify-between border-t border-gray-200 pt-4 text-lg font-bold text-gray-900">
            <span>Total</span>
            <span>${{ number_format($total,2) }}</span>
        </div>

    </div>

</div>