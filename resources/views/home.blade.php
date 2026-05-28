@extends('layouts.app')
@section('title', 'Sports Warehouse')
@section('content')
    @include('layouts.partials._hero_banner')


            <section class="site-main__section featured-products">
                <h2 class="site-main__h2">Featured products</h2>
                <div class="featured-products-wrapper">

                    <article class="featured-products__product-card">
                        <a href="#" class="product-card">
                        <h3 class="product-card__title">adidas Euro16 Top Soccer Ball</h3>
                        <img src="images/products/soccerBall.jpg"
                            alt="White Adidas soccer ball with black, red and blue geometric details" width="125"
                            class="product-card__img">
                        <p class="product-card__price product-price">
                            <span class="discounted-price"><ins>$34.95</ins></span>
                            <span class="original-price"><span class="original-price__was">was</span><del
                                    class="original-price__del">$46.00</del></span>
                        </p>
                    </a>
                    </article>

                    <article class="featured-products__product-card">
                        <a href="#" class="product-card">
                        <h3 class="product-card__title">Pro-tec Classic Skate Helmet</h3>
                        <img src="images/products/skateHelmet.jpg" alt="Black skate helmet" width="125"
                            class="product-card__img">
                        <p class="product-card__price product-price">
                            <span class="current-price">$70.00</span>
                        </p>
                    </a>
                    </article>

                    <article class="featured-products__product-card">
                        <a href="#" class="product-card">
                        <h3 class="product-card__title">Nike Sport 600ml Water Bottle</h3>
                        <img src="images/products/waterBottle.jpg" alt="Black and pink sippy water bottle" width="125"
                            class="product-card__img">
                        <p class="product-card__price product-price">
                            <span class="discounted-price"><ins>$15.00</ins></span>
                            <span class="original-price"><span class="original-price__was">was</span><del
                                    class="original-price__del">$17.50</del></span>
                        </p>
                    </a>
                    </article>

                    <article class="featured-products__product-card">
                        <a href="#" class="product-card">
                        <h3 class="product-card__title">Sting ArmaPlus Boxing Gloves</h3>
                        <img src="images/products/boxingGloves.jpg"
                            alt="Black boxing gloves with red stylised spider legs stinger logo" width="125"
                            class="product-card__img">
                        <p class="product-card__price product-price">
                            <span class=" current-price">$79.95</span>
                        </p>
                    </a>
                    </article>

                    <article class="featured-products__product-card">
                        <a href="#" class="product-card">
                        <h3 class="product-card__title">Asics Gel Lethal Tigreor 8 IT Men's</h3>
                        <img src="images/products/footyBoots.jpg"
                            alt="White Soccer shoes with black stripes and blue spikes" width="125"
                            class="product-card__img">
                        <p class="product-card__price product-price">
                            <span class="discounted-price"><ins>$15.00</ins></span>
                            <span class="original-price"><span class="original-price__was">was</span><del
                                    class="original-price__del">$17.50</del></span>
                        </p>
                    </a>
                    </article>

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