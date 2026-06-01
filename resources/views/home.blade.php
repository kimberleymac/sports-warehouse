@extends('layouts.app')
@section('title', 'Sports Warehouse')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">Featured products</h2>
                <div class="featured-products-wrapper">

                    @include('layouts.partials._product_cards', ["items" => $featuredItems])
                    
                </div> 
            </section>

           

            <section class="site-main__section brand-partnerships">
                <h2 class="site-main__h2 brand-partnerships__h2">Our brands and partnerships</h2>
                <div class="brand-partnerships-wrapper">
                    <div class="brand-partnerships__h2_p">
                        <p class="brand-partnerships__p">These are some of our top brands and partnerships.</p>
                        <p class="brand-partnerships__p brand-partnerships__p--blue">The best of the best is here</p>
                    </div>
                    <div class="brand-partnerships__imgs">
                        <img src="images/partners/logo-nike.png" alt="Nike logo">
                        <img src="images/partners/logo-adidas.png" alt="Adidas logo">
                        <img src="images/partners/logo-skins.png" alt="Skins logo">
                        <img src="images/partners/logo-asics.png" alt="Asics logo">
                        <img src="images/partners/logo-new-balance.png" alt="New Balance logo">
                        <img src="images/partners/logo-wilson.png" alt="Wilson logo">
                    </div>
                </div>
            </section>
       

@endsection