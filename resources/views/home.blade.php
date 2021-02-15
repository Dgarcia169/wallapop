@extends('layouts.app')


<!DOCTYPE html>
<html>

<!-- Mirrored from 8theme.com/demo/html/mango/index-wide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 13:34:26 GMT -->
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
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('public/assets/css/wallapop.css')}}" rel="stylesheet" type="text/css"/>
    <!--[if IE 9]>
        <link href="css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="shortcut icon" href="{{url('public/assets/img/favicon-5.ico')}}" />
  	<title>Wallapop</title>
</head>
<body class="style-5 style-7">

   

    <div id="content-block">

        <!-- HEADER -->
        <div class="header-wrapper style-5 style-7">
            <header class="type-2 fixed-header">
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
                                        <a href="#" class="active">Home</a>
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
                                        
                                            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a><a class="fixed-header-square-button"><i class="fa fa-chevron-down"></i></a>
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
                                        
                                    @endguest
                                    </li>
                                    
                                    <li class="full-width-columns">
                                        <a href="#"></a>
                                    </li>
                                    <li class="simple-list">
                                        <a href="{{ route('deseados') }}">Deseados {{$count[0]->count}}</a>
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

            <div class="wide-center" style="margin-top:200px;">
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">Todos los productos</h3>
                    </div>
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                
                                <!-- Lopear a tope de productos -->
                                
                                @foreach ($productos as $producto)
                                <div class="swiper-slide"> 
                                    <div class="paddings-container">
                                        <div class="product-slide-entry">
                                            <div class="product-image">
                                                
                                                <a href="{{ url('product/' . $producto->id) }}" > <img src="data:image/jpeg;base64,{{$producto->foto}}" alt="" style="width:300px; height:200px;" /> </a>
                                            </div>
                                            
                                            
                                            @foreach ($categorias as $categoria)
                                                @if ($categoria->id == $producto->idcategoria)
                                                    <a class="tag" href="#"> {{$categoria['categoria']}}</a>
                                                @endif
                                            @endforeach
                                            <a class="title" href="#"> {{$producto['nombre']}}</a>
                                            <div class="rating-box">
                                            @foreach ($users as $user)
                                                @if($user->id == $producto->iduser)
                                                    <a class="tag" href="#"> {{$user['name']}}</a>
                                                @endif()
                                            @endforeach
                                            </div>
                                            <div class="price">
                                                <div class="current">{{$producto['precio']}} $</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>

                 <div class="block-header">
                    <h3 class="title">Vender un Producto</h3>
                    <div class="description">Haga click si quiere añadir una venta</div><br>
                    <a href="{{route('addproduct')}}"><div class="button style-10">Añadir</div></a>
                </div>

                <div class="clear"></div>
            </div>
            
        </div>

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
                <a class="image"><img src="{{url('public/assets/img/product-menu-1.jpg')}}" alt="" /></a>
                <div class="content">
                    <a class="title" href="#">Pullover Batwing Sleeve Zigzag</a>
                    <div class="quantity">Quantity: 4</div>
                    <div class="price">$990,00</div>
                </div>
                <div class="button-x"><i class="fa fa-close"></i></div>
            </div>
            <div class="cart-entry">
                <a class="image"><img src="{{url('public/assets/img/product-menu-1_.jpg')}}" alt="" /></a>
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
    <div id="product-popup" class="overlay-popup">
        
        <div class="overflow">
            <div class="table-view">
                <div class="cell-view">
                    <div class="close-layer"></div>
                    <div class="popup-container">

                        <div class="row">
                            <div class="col-sm-6 information-entry">
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
                            <div class="col-sm-6 information-entry">
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
                                    <div class="product-description detail-info-entry">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur.</div>
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
                                </div>
                            </div>
                        </div>

                        <div class="close-popup"></div>
                    </div>
                </div>
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

<!-- Mirrored from 8theme.com/demo/html/mango/index-wide.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 13:36:17 GMT -->
</html>


