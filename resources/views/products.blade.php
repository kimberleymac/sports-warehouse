@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">Products</h2>
                <div class="featured-products-wrapper">

                    {{-- //TODO Create a partial file for product cards _product_card etc--}}
                    @if (empty($items))

                    <p>No products to display</p>
                    
                    @else
                    
                    <ul>
                    
                    @foreach ($items as $item)
                    <li>{{ $item->itemName }}</li>
                    @endforeach
                    </ul>

                    @endif

                    


            </section>

@endsection