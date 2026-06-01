@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">{{ $category->categoryName }}</h2>
                <div class="featured-products-wrapper">
                    
                    @include('layouts.partials._product_cards')
                    
                </div>
            </section>

@endsection