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
    <link href="{{url('public/assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
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
                                        <a class="active" href="home">Home</a>
                                        
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
                                            </a>
            
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
                                        <a href="{{url('login')}}">Products</a>
                                    </li>
                                    <li class="column-1">
                                        <a href="{{url('login')}}">Mis notificaciones</a>
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

            <div class="wide-center" style="margin-top: 200px">
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">Stock</h3>
                        <div class="description">Si quiere ver el stock de la pagina debe iniciar sesion o crearse un nuevo usuario</div>
                    </div>
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                
                                <!-- Lopear a tope de productos -->
                               
                                </div>
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
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


