<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Warehouse</title>
    <!-- Open Sans font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Style Sheet -->
    <link rel="stylesheet" href="style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="site-wrapper">

        <nav id="main-menu" class="site-nav" aria-label="site-navigation">
            <div class="wrapper-960px">
                <ul class="menu">
                    <li class="menu__item menu__login"><a class="menu__link" href="#"><i
                                class="fa-solid fa-lock"></i>Login</a></li>
                    <li class="menu__toggle"><a href="#" aria-label="Open menu"><i class="fas fa-bars"
                                aria-label="Open menu"></i></a></li>
                    <li class="menu__item">
                        <a class="menu__link" href="#">
                            <i class="fa-regular fa-circle"></i>Home</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="#">
                            <i class="fa-regular fa-circle"></i>About SW</a>
                    </li>
                    <li class="menu__item"><a class="menu__link" href="#">
                            <i class="fa-regular fa-circle"></i>Contact Us</a></li>
                    <li class="menu__item view-products">
                        <a class="menu__link" href="#">
                            <i class="fa-regular fa-circle"></i>View Products</a>
                    </li>
                    <li class="menu__cart view-cart">
                        <a href="#">
                            <i class="fa-solid fa-cart-shopping"></i>View Cart</a>
                    </li>
                    <li class="menu__no-items cart-items full-centre">
                        <a href="#"><span class="no-of-items">0</span>items</a>
                    </li>

                </ul>
            </div>
        </nav>

        <header class="site-header ">

            <div class="full-centre">
                <div class="site-logo-search-container">

                    <div class="site-logo">
                        <a href="index.html"><img class="site-logo__img" src="images/logo/sports-warehouse-logo.svg"
                                alt="sports-warehouse-logo" width="600"></a>
                    </div>

                    <div class="site-search-bar">
                        <form action="search" method="get" class="search-bar-form">
                            <label class="search-bar sr-only" for="search">Search Products</label>
                            <input type="search" id="search" aria-label="Search products" placeholder="Search products">

                            <button class="search-button" type="submit" aria-label="Search"><i
                                    class="fa-solid fa-magnifying-glass"></i> <span
                                    class="sr-only">Search</span></button>
                        </form>

                    </div>

                </div>
            </div>
            <nav class="product-categories" aria-label="product-categories">
                <ul class="product-categories__ul">
                    <li><a href="#">Shoes</a></li>
                    <li><a href="#">Helmets</a></li>
                    <li><a href="#">Pants</a></li>
                    <li><a href="#">Tops</a></li>
                    <li><a href="#">Balls</a></li>
                    <li><a href="#">Equipment</a></li>
                    <li><a href="#">Training gear</a></li>
                </ul>
            </nav>

        </header>

        <main class="site-main">

            <section class="banner wrapper__960px">
                <!-- The Swiper banner using pagination -->
                <div class="swiper banner__image">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/banner/banner-soccer-ball.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="images/banner/football-in-grass-with-shadow.jpg" alt="">
                        </div>
                        <div class="swiper-slide"><img src="images/banner/lawn-with-soccer-ball.jpg" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>


                <!-- This overlay sits on top of the img element and is its own block -->
                <div class="banner__overlay overlay">
                    <div class="overlay__text full-centre">
                        <h2 class="overlay__title">Sports balls</h2>
                        <p class="overlay__tag">View out brand new range of</p>
                        <a class="overlay__button" href="#">Shop Now</a>
                    </div>
                </div>
            </section>

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
        </main>

        <footer class="site-footer">
            <div class="wrapper-960px site-footer__main">
                <section class="footer-site-navigation">
                    <h3>Site Navigation</h3>
                    <ul class="footer-site-navigation__ul">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">About SW</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">View products</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </section>
                <section class="footer-product-categories">
                    <h3>Product Categories</h3>
                    <ul class="footer-product-categories__ul">
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Helmets</a></li>
                        <li><a href="#">Pants</a></li>
                        <li><a href="#">Tops</a></li>
                        <li><a href="#">Balls</a></li>
                        <li><a href="#">Equipment</a></li>
                        <li><a href="#">Training gear</a></li>
                    </ul>
                </section>
                <section class="footer-social-media-links">
                    <h3>Contact Sports Warehouse</h3>
                    <div class="social-media-links">
                        <a href="#" class="social-media-links__facebook">
                            <div class="icon-container"><i class="fa-brands fa-facebook-f fa-social-media"></i>
                            </div>
                            <span class="social-media-title">Facebook</span>
                        </a>
                        <a href="#" class="social-media-links__X">
                            <div class="icon-container"><i class="fa-brands fa-twitter fa-social-media"></i></div>
                            <span class="social-media-title">Twitter</span>
                        </a>
                        <a href="mailto:info@sportswarehouse.com.au" class="social-media-links__other">
                            <div class="icon-container"><i class="fa-solid fa-paper-plane fa-social-media"></i>
                            </div>
                            <span class="social-media-title">Other</span>
                        </a>
                    </div>
                </section>
            </div>

        </footer>
        <small class="site-sub-footer">
            <div class="wrapper-960px sub-footer">
                <span>&copy; Copyright 2222 Sports Warehouse.</span>
                <span>All rights reserved.</span>
                <span>Website made by Awesomesauce Design and Kimberley Mackenzie</span>
            </div>
        </small>


    </div>
    <!-- Hamburger Menu Script-->
    <script src="menu.js"></script>
    <!-- Swiper JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="swiper.js"></script>
</body>



</html>