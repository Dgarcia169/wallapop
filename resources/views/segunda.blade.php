<!DOCTYPE html>
<html>

<!-- Mirrored from 8theme.com/demo/html/mango/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 13:42:05 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    <link href="{{url('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />  
    <link href="{{url('public/assets/css/idangerous.swiper.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('public/assets/css/wallapop.css')}}" rel="stylesheet" type="text/css"/>
    <!--[if IE 9]>
        <link href="css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="shortcut icon" href="{{url('public/assets/img/favicon-5.ico')}}" />
  	<title>Mango - Product</title>
</head>
<body class="style-10">

    <!-- LOADER -->
   

    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
            <div class="header-wrapper style-5 style-7">
            <header class="type-2">
                <div class="navigation-vertical-align">
                    <div class="cell-view logo-container">
                        <a id="logo" href="#"><img src="{{url('public/assets/img/logo-7.png')}}" alt="" /></a>
                    </div>
                    <div class="cell-view nav-container">
                        <div class="navigation">
                            <div class="navigation-header responsive-menu-toggle-class">
                                <div class="title">Navigation</div>
                                <div class="close-menu"></div>
                            </div>
                            <div class="nav-overflow">
                                <nav>
                                <ul>
                                    <li class="full-width">
                                        <a class="active">Home</a>
                                        
                                    </li>
                                    
                                    
                                    <li class="full-width">
                                    @guest
                                        @if (Route::has('login'))
                                            
                                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                                            
                                        @endif
                                        
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a><i class="fa fa-shopping-cart"></i>
            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
            
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                    </li>
                                    
                                    
                                 
                                    <li class="full-width-columns">
                                        <a href="#"></a>
                                    </li>
                                    <li class="simple-list">
                                        <a href="shop.html">Products</a>
                                    </li>
                                    <li class="column-1">
                                        <a href="portfolio-default.html">Portfolio</a>
                                       
                                           
                                        
                                    </li>
                                    <li class="column-1">
                                        <a href="blog.html">Blog</a>
                                    </li>
                                   
                                    <li class="fixed-header-visible">
                                        <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>
                                <div class="clear"></div>

                                <a class="fixed-header-visible additional-header-logo"><img src="{{url('public/assets/img/logo-7.png')}}" alt=""/></a>
                            </nav>
                                <div class="navigation-footer responsive-menu-toggle-class">
                                    <div class="socials-box">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="navigation-copyright">Created by <a href="#">8theme</a>. All rights reserved</div>
                                </div>
                            </div>
                        </div>
                        <div class="responsive-menu-toggle-class">
                            <a href="#" class="header-functionality-entry menu-button"><i class="fa fa-reorder"></i></a>
                            <a href="#" class="header-functionality-entry open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                            <a href="#" class="header-functionality-entry open-search-popup"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="close-header-layer"></div>
            </header>
            <div class="clear"></div>
        </div>

            <div class="content-push">

                <div class="breadcrumb-box">
                    <a href="#">Home</a>
                    <a href="#">Shop</a>
                    <a href="#">T-shirts</a>
                    <a href="#">Careers</a>
                    <a href="#">T-shirt Stampata</a>                         
                </div>

                <div class="information-blocks">
                    <div class="row">
                        <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
                            <div class="product-preview-box">
                                <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('public/assets/img/product-main-1.jpg')}}" alt="" data-zoom="img/product-main-1-zoom.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('public/assets/img/product-main-2.jpg')}}" alt="" data-zoom="img/product-main-2-zoom.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('public/assets/img/product-main-3.jpg')}}" alt="" data-zoom="img/product-main-3-zoom.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="{{url('public/assets/img/product-main-4.jpg')}}" alt="" data-zoom="img/product-main-4-zoom.jpg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pagination"></div>
                                    <div class="product-zoom-container">
                                        <div class="move-box">
                                            <img class="default-image" src="{{url('public/assets/img/product-main-1.jpg')}}" alt="" />
                                            <img class="zoomed-image" src="{{url('public/assets/img/product-main-1-zoom.jpg')}}" alt="" />
                                        </div>
                                        <div class="zoom-area"></div>
                                    </div>
                                </div>
                                <div class="swiper-hidden-edges">
                                    <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide selected">
                                                <div class="paddings-container">
                                                    <img src="{{url('public/assets/img/product-main-1.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('public/assets/img/product-main-2.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('public/assets/img/product-main-3.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="{{url('public/assets/img/product-main-4.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 col-md-4 information-entry">
                            <div class="product-detail-box">
                                <h1 class="product-title">T-shirt Basic Stampata</h1>
                                <h3 class="product-subtitle">Loremous Clothing</h3>
                                <div class="rating-box">
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="star"><i class="fa fa-star-o"></i></div>
                                    <div class="rating-number">25 Reviews</div>
                                </div>
                                <div class="product-description detail-info-entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <div class="price detail-info-entry">
                                    <div class="prev">$90,00</div>
                                    <div class="current">$70,00</div>
                                </div>
                                <div class="size-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Size</div>
                                    <div class="entry active">xs</div>
                                    <div class="entry">s</div>
                                    <div class="entry">m</div>
                                    <div class="entry">l</div>
                                    <div class="entry">xl</div>
                                    <div class="spacer"></div>
                                </div>
                                <div class="color-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Color</div>
                                    <div class="entry active" style="background-color: #d23118;">&nbsp;</div>
                                    <div class="entry" style="background-color: #2a84c9;">&nbsp;</div>
                                    <div class="entry" style="background-color: #000;">&nbsp;</div>
                                    <div class="entry" style="background-color: #d1d1d1;">&nbsp;</div>
                                    <div class="spacer"></div>
                                </div>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Quantity</div>
                                    <div class="entry number-minus">&nbsp;</div>
                                    <div class="entry number">10</div>
                                    <div class="entry number-plus">&nbsp;</div>
                                </div>
                                <div class="detail-info-entry">
                                    <a class="button style-10">Add to cart</a>
                                    <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                    <div class="clear"></div>
                                </div>
                                <div class="tags-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Tags:</div>
                                    <a href="#">bootstrap</a>/
                                    <a href="#">collections</a>/
                                    <a href="#">color/</a>
                                    <a href="#">responsive</a>
                                </div>
                                <div class="share-box detail-info-entry">
                                    <div class="title">Share in social media</div>
                                    <div class="socials-box">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clear visible-xs visible-sm"></div>
                        <div class="col-md-4 col-lg-3 information-entry product-sidebar">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="information-blocks production-logo">
                                        <div class="background">
                                            <div class="logo"><img src="{{url('public/assets/img/production-logo.png')}}" alt="" /></div>
                                            <a href="#">Review this producent</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="information-blocks">
                                        <div class="information-entry products-list">
                                            <h3 class="block-title inline-product-column-title">Featured products</h3>
                                            <div class="inline-product-entry">
                                                <a href="#" class="image"><img alt="" src="{{url('public/assets/img/product-image-inline-1.jpg')}}"></a>
                                                <div class="content">
                                                    <div class="cell-view">
                                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="inline-product-entry">
                                                <a href="#" class="image"><img alt="" src="{{url('public/assets/img/product-image-inline-2.jpg')}}"></a>
                                                <div class="content">
                                                    <div class="cell-view">
                                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="inline-product-entry">
                                                <a href="#" class="image"><img alt="" src="{{url('public/assets/img/product-image-inline-3.jpg')}}"></a>
                                                <div class="content">
                                                    <div class="cell-view">
                                                        <a href="#" class="title">Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="information-blocks">
                    <div class="tabs-container">
                        <div class="swiper-tabs tabs-switch">
                            <div class="title">Products</div>
                            <div class="list">
                                <a class="block-title tab-switcher active">Featured Products</a>
                                <a class="block-title tab-switcher">Popular Products</a>
                                <a class="block-title tab-switcher">New Arrivals</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div>
                            <div class="tabs-entry">
                                <div class="products-swiper">
                                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-1.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                                            <div class="bottom-line">
                                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-2.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-12.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-3.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <div class="bottom-line left-attached">
                                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-4.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-12.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-5.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-entry">
                                <div class="products-swiper">
                                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-6.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-12.jpg')}}" alt="" />
                                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                                            <div class="bottom-line">
                                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-7.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-8.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-12.jpg')}}" alt="" />
                                                            <div class="bottom-line left-attached">
                                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-9.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-10.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-12.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-entry">
                                <div class="products-swiper">
                                    <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-1.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a left"><i class="fa fa-retweet"></i></a>
                                                            <a class="top-line-a right"><i class="fa fa-heart"></i></a>
                                                            <div class="bottom-line">
                                                                <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-3.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-5.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <div class="bottom-line left-attached">
                                                                <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-7.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide"> 
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry shift-image">
                                                        <div class="product-image">
                                                            <img src="{{url('public/assets/img/product-minimal-9.jpg')}}" alt="" />
                                                            <img src="{{url('public/assets/img/product-minimal-11.jpg')}}" alt="" />
                                                            <a class="top-line-a right"><i class="fa fa-expand"></i> <span>Quick View</span></a>
                                                            <div class="bottom-line">
                                                                <div class="right-align">
                                                                    <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                    <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="left-align">
                                                                    <a class="bottom-line-a"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="tag" href="#">Men clothing</a>
                                                        <a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
                                                        <div class="rating-box">
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                            <div class="star"><i class="fa fa-star"></i></div>
                                                        </div>
                                                        <div class="price">
                                                            <div class="prev">$199,99</div>
                                                            <div class="current">$119,99</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
               

                <!-- FOOTER -->
                <div class="footer-wrapper style-10">
                    <footer class="type-1">
                        <div class="footer-columns-entry">
                            <div class="row">
                                <div class="col-md-3">
                                    <img class="footer-logo" src="{{url('public/assets/img/logo-9.png')}}" alt="" />
                                    <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                                    <div class="footer-address">30 South Avenue San Francisco<br/>
                                        Phone: +78 123 456 789<br/>
                                        Email: <a href="mailto:Support@blanco.com">Support@blanco.com</a><br/>
                                        <a href="www.inmedio.com/index.html"><b>www.inmedio.com</b></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <h3 class="column-title">Our Services</h3>
                                    <ul class="column">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Custom Service</a></li>
                                        <li><a href="#">Terms &amp; Condition</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <h3 class="column-title">Our Services</h3>
                                    <ul class="column">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Custom Service</a></li>
                                        <li><a href="#">Terms &amp; Condition</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="col-md-2 col-sm-4">
                                    <h3 class="column-title">Our Services</h3>
                                    <ul class="column">
                                        <li><a href="#">About us</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Custom Service</a></li>
                                        <li><a href="#">Terms &amp; Condition</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Returns</a></li>
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                                <div class="clearfix visible-sm-block"></div>
                                <div class="col-md-3">
                                    <h3 class="column-title">Company working hours</h3>
                                    <div class="footer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</div>
                                    <div class="footer-description">
                                        <b>Monday-Friday:</b> 8.30 a.m. - 5.30 p.m.<br/>
                                        <b>Saturday:</b> 9.00 a.m. - 2.00 p.m.<br/>
                                        <b>Sunday:</b> Closed
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom-navigation">
                            <div class="cell-view">
                                <div class="footer-links">
                                    <a href="#">Site Map</a>
                                    <a href="#">Search</a>
                                    <a href="#">Terms</a>
                                    <a href="#">Advanced Search</a>
                                    <a href="#">Orders and Returns</a>
                                    <a href="#">Contact Us</a>
                                </div>
                                <div class="copyright">Created with by <a href="#">8theme</a>. All right reserved</div>
                            </div>
                            <div class="cell-view">
                                <div class="payment-methods">
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-1.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-2.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-3.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-4.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-5.png')}}" alt="" /></a>
                                    <a href="#"><img src="{{url('public/assets/img/payment-method-6.png')}}" alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        </div>
        <div class="clear"></div>

    </div>

    <div class="search-box popup">
        <form>
            <div class="search-button">
                <i class="fa fa-search"></i>
                <input type="submit" />
            </div>
            <div class="search-drop-down">
                <div class="title"><span>All categories</span><i class="fa fa-angle-down"></i></div>
                <div class="list">
                    <div class="overflow">
                        <div class="category-entry">Category 1</div>
                        <div class="category-entry">Category 2</div>
                        <div class="category-entry">Category 2</div>
                        <div class="category-entry">Category 4</div>
                        <div class="category-entry">Category 5</div>
                        <div class="category-entry">Lorem</div>
                        <div class="category-entry">Ipsum</div>
                        <div class="category-entry">Dollor</div>
                        <div class="category-entry">Sit Amet</div>
                    </div>
                </div>
            </div>
            <div class="search-field">
                <input type="text" value="" placeholder="Search for product" />
            </div>
        </form>
    </div>

    <div class="cart-box popup">
        <div class="popup-container">
            <div class="cart-entry">
                <a class="image"><img src="img/product-menu-1.jpg" alt="" /></a>
                <div class="content">
                    <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                    <div class="quantity">Quantity: 4</div>
                    <div class="price">$990,00</div>
                </div>
                <div class="button-x"><i class="fa fa-close"></i></div>
            </div>
            <div class="cart-entry">
                <a class="image"><img src="img/product-menu-1_.jpg" alt="" /></a>
                <div class="content">
                    <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                    <div class="quantity">Quantity: 4</div>
                    <div class="price">$990,00</div>
                </div>
                <div class="button-x"><i class="fa fa-close"></i></div>
            </div>
            <div class="summary">
                <div class="subtotal">Subtotal: $990,00</div>
                <div class="grandtotal">Grand Total <span>$1029,79</span></div>
            </div>
            <div class="cart-buttons">
                <div class="column">
                    <a class="button style-3">view cart</a>
                    <div class="clear"></div>
                </div>
                <div class="column">
                    <a class="button style-4">checkout</a>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

        <script src="{{url('public/assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{url('public/assets/js/idangerous.swiper.min.js')}}"></script>
    <script src="{{url('public/assets/js/global.js')}}"></script>

    <!-- custom scrollbar -->
    <script src="{{url('public/assets/js/jquery.mousewheel.js')}}"></script>
    <script src="{{url('public/assets/js/jquery.jscrollpane.min.js')}}"></script>
</body>

<!-- Mirrored from 8theme.com/demo/html/mango/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 13:42:06 GMT -->
</html>
