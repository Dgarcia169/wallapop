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
  	<title>Wallapop</title>
</head>
<body class="style-10">

    <!-- LOADER -->
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
                                        <a href="{{url('home')}}" class="active">Home</a>
                                        
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
                                        <a href="{{url('deseados')}}">Deseados {{$count[0]->count}}</a>
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

    <div id="content-block">

        <div class="content-center fixed-header-margin">
            <!-- HEADER -->
           <br><br>

            <div class="content-push">
                <div class="information-blocks">
                    <div class="row">
                        
                        <div class="col-sm-5 col-md-5 information-entry">
                            <div class="product-detail-box">
                                <h1 class="product-title">{{$producto[0]->nombre}}</h1>
                                <div class="rating-box">
                                    <div class="product-description detail-info-entry">DESCRIPCIÓN: {{$producto[0]->descripcion}}</div>
                                </div>
                                <div class="price detail-info-entry">
                                    <div class="current">{{$producto[0]->precio}} $</div>
                                </div>
                                <div class="size-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Estado: {{$producto[0]->estado}}</div>
                                    
                                    <div class="spacer"></div>
                                </div>
                                <div class="color-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Fecha de subida: {{$producto[0]->fecha}}</div>
                                    <div class="spacer"></div>
                                </div>
                                <div class="quantity-selector detail-info-entry">
                                    <div class="detail-info-entry-title">Uso del producto: {{$producto[0]->uso}}</div>
                                </div>
                                <div class="detail-info-entry">
                                    <form action="{{ url('adddeseados') }}" method="post">
                                        @csrf
                                        <input id="iduser" placeholder="{{ Session::get('id') }}" type="hidden" class="form-control" name="iduser" value="{{ Session::get('id') }}" required>
                                        <input id="idproducto" type="hidden" class="form-control" @foreach($producto as $product) placeholder="{{$product->id}}" @endforeach name="idproducto" @foreach($producto as $product) value="{{$product->id}}" @endforeach required>
                                        <input type="submit" value="Añadir a deseados" class="button style-10 alargar">
                                    </form>
                                    <div class="clear"></div>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="col-md-2 information-entry">
                        </div>
                    
                        <div class="col-sm-5 col-md-5 col-lg-5 information-entry">
                            <div class="product-preview-box">
                                <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                @foreach($producto as $product)
                                                <img src="data:image/jpeg;base64,{{$product->foto}}" alt="" data-zoom="img/product-main-1-zoom.jpg" />
                                                @endforeach
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
                                        
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="clear visible-xs visible-sm"></div>
                    </div>
                    
                </div>

                @if(!is_null($contactos))
                
                    <div class="row">
                        <div class="col-sm-12 information-entry">
                            <div class="login-box">
                                <div class="article-container style-1">
                                    <h3>Contacta conmigo</h3>
                                </div>
                                <form action="{{ url('contacto') }}" method="post">
                                    @csrf
                                    <input type="hidden" readonly maxlength="40" class="form-control" id="iduser1" placeholder="" name="iduser1" value="{{ Session::get('id') }}">
                                    <input type="hidden" maxlength="40" required class="form-control" id="iduser2" value="{{$contactos[0]->iduser2}}" name="iduser2">
                                    <input type="hidden" id="is_vendedor" name="is_vendedor" value=0>
                                    <input type="hidden" maxlength="40"  required class="form-control" id="idproducto"  placeholder="{{$contactos[0]->idproducto}}"  name="idproducto" value="{{$contactos[0]->idproducto}}">
                                    <input type="text" maxlength="40"  required class="form-control" id="textocontacto" placeholder="Introducir Texto" name="textocontacto" value="{{ old('textocontacto') }}">
                                    <br><br>
                                    <button type="submit" class="button style-10">Enviar</button>
                                </form>
                                
                                
                            </div>
                        </div>
                        
                        
                        <div class="col-md-3"></div>
                        
                        <div class="col-md-12" style="padding-top:10px; margin-bottom: 100px;">
                            <div class="accordeon">
                                <h2 id="contact-messages">Mensajes : </h2>
                            @if(!isset($contactos[0]->noComment))
                                @foreach ($contactos as $contacto)
                                    @if($contacto->is_vendedor == 0)
                                        
                                        <div class="accordeon-session">
                                            <p>{{Session::get('name')}} : </p>
                                            <p>{{$contacto->created_at}}</p>
                                        </div>
                                        
                                        <div class="accordeon-entry contact-left" style="display: block;">
                                            <div class="article-container style-1">
                                                <p>{{$contacto->textocontacto}}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="accordeon-position">
                                            <div class="contact-righta">
                                                <p>{{$contacto->name}} : </p>
                                                <p>{{$contacto->created_at}}</p>
                                            </div>
                                            <div class="accordeon-entry contact-right" style="display: block;">
                                                <div class="article-container style-1">
                                                    <p>{{$contacto->textocontacto}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            </div>
                            
                        </div>
                         <div class="col-md-3"></div>
                        @endif
                        
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

        <script src="{{url('public/assets/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{url('public/assets/js/idangerous.swiper.min.js')}}"></script>
    <script src="{{url('public/assets/js/global.js')}}"></script>

    <!-- custom scrollbar -->
    <script src="{{url('public/assets/js/jquery.mousewheel.js')}}"></script>
    <script src="{{url('public/assets/js/jquery.jscrollpane.min.js')}}"></script>
</body>

<!-- Mirrored from 8theme.com/demo/html/mango/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 13:42:06 GMT -->
</html>
