@extends('layouts.app')
@section('title', 'Sports Warehouse Products')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">You have {{ $items->count() }} saved items</h2>
                <div class="featured-products-wrapper">

                    {{-- Show list of saved items --}}

                    @if (empty($items))

                    <p>You have no saved items</p>
                    
                    @else
                    
                    @include('layouts.partials._product_cards', ['items'=> $items])
                    
                    @endif

                    {{-- //TODO CTA buttons if items have been saved --}}


                </div>
            </section>

@endsection