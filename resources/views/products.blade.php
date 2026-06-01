@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">All products</h2>
                <div class="featured-products-wrapper">

                    @include('layouts.partials._product_cards')
                    
                </div> 
            </section>

@endsection