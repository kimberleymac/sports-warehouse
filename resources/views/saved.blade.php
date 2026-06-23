@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')

    <section class="site-main__section featured-products">
        <h2 class="site-main__h2">Shopping cart</h2>
        <div class="">

            {{-- <h3>Order summary <span>{{ $items->count() }} items</span></h3>


            @if (empty($items))

            <p>You have no items in the cart</p>
            
            @else 
            @endif
        
            
            --}}
            
            @include('layouts.partials._product_cards_cart', ['items'=> $items])
            
            

            

            </div>
         
    </section>

@php
    $total = 0;
@endphp

@foreach ($items as $item)
    @php
        $unitPrice = $item->salePrice ?? $item->price;
        $total += $unitPrice * $item->quantity;
    @endphp
@endforeach

<div class="mt-6 rounded-lg border border-gray-200 bg-white p-4 shadow-sm">

    <div class="flex items-center justify-between">
        <span class="text-gray-600">Total</span>

        <span class="text-lg font-bold text-gray-900">
            ${{ number_format($total,2)}}
        </span>
    </div>

</div>
<div>
    <a href="/checkout" class="checkout-button">Checkout</a>
</div>





@endsection