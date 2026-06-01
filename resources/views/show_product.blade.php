@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')

            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">Product</h2>
                <div class="featured-products-wrapper">

                    {{-- <p>This shows a single product</p>

                    <p style="color:red;"> {{ $item->itemName }}</p> --}}


                    @include('layouts.partials._single_product_card')

                    

                </div>
            </section>

@endsection