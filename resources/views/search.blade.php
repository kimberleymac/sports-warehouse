@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">{{ $items->count() }} results for "{{ $searchTerm }}"</h2>
                <div class="featured-products-wrapper">

                    {{-- <x-nav-categories/> --}}

                    {{-- Show the product that is searched --}}
                    @if (empty($items))

                    <p>No products to display</p>
                    
                    @else
                    
                    @include('layouts.partials._product_cards')
                    
                    @endif

                </div>
            </section>

@endsection