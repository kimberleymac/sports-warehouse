@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">Products</h2>
                <div class="featured-products-wrapper">

                    <p>This shows a single category</p>

                    <p style="color:red;"> {{ $category->categoryName }}</p>


                    {{-- //TODO fix up this part --}}
                    {{-- @include(partials._item_card) --}}
                    


            </section>

@endsection