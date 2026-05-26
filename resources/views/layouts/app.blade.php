<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Sports Warehouse')</title>
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
                        <a class="menu__link" href="/">
                            <i class="fa-regular fa-circle"></i>Home</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link" href="#">
                            <i class="fa-regular fa-circle"></i>About SW</a>
                    </li>
                    <li class="menu__item"><a class="menu__link" href="/contactus">
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
                        <a href="index.html"><img class="site-logo__img" src="{{ asset('images/logo/sports-warehouse-logo.svg') }}"
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
            
            {{-- !! Content Here !! --}}
            
            @yield('content')

             
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
                <span>&copy; Copyright {{ date('Y') }} Sports Warehouse.</span>
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