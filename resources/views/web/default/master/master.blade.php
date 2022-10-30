<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="copyright" content="{{$configuracoes->ano_de_inicio}} - {{$configuracoes->nomedosite}}">
    <meta name="language" content="pt-br" /> 
    <meta name="author" content="{{env('DESENVOLVEDOR')}}"/>
    <meta name="designer" content="Renato Montanari">
    <meta name="publisher" content="Renato Montanari">
    <meta name="url" content="{{$configuracoes->dominio}}" />
    <meta name="keywords" content="{{$configuracoes->metatags}}">
    <meta name="distribution" content="web">
    <meta name="rating" content="general">
    <meta name="date" content="Dec 26">

    <meta name="msvalidate.01" content="AB238289F13C246C5E386B6770D9F10E" />

    {!! $head ?? '' !!}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}" type="image/x-icon" />
    
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url(asset('frontend/assets/fonts/icomoon/style.css'))}}">
    <link rel="stylesheet" type="text/css" href="{{url(asset('frontend/assets/css/font-awesome.min.css'))}}" />
    <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/assets/css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{url('frontend/assets/fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{url('frontend/assets/css/aos.css')}}">
    <link href="{{url('frontend/assets/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{url('frontend/assets/css/style.css')}}">

    @hasSection('css')
        @yield('css')
    @endif
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 d-flex">
                        <a href="{{route('web.home')}}" class="site-logo" title="{{$configuracoes->nomedosite}}">
                            <img title="{{$configuracoes->nomedosite}}" alt="{{$configuracoes->nomedosite}}" src="{{$configuracoes->getLogomarca()}}">
                        </a>
                        <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                    </div>
                    <div class="col-12 col-lg-6 ml-auto d-flex">
                        <div class="ml-md-auto top-social d-none d-lg-inline-block">
                            @if ($configuracoes->facebook)
                                <a class="d-inline-block p-3" target="_blank" href="{{$configuracoes->facebook}}" title="Facebook" ><span class="icon-facebook"></span></a>
                            @endif
                            @if ($configuracoes->twitter)
                                <a class="d-inline-block p-3" target="_blank" href="{{$configuracoes->twitter}}" title="Twitter" ><span class="icon-twitter"></span></a>
                            @endif
                            @if ($configuracoes->instagram)
                                <a class="d-inline-block p-3" target="_blank" href="{{$configuracoes->instagram}}" title="Instagram" ><span class="icon-instagram"></span></a>
                            @endif
                            @if ($configuracoes->linkedin)
                                <a class="d-inline-block p-3" target="_blank" href="{{$configuracoes->linkedin}}" title="linkedin" ><span class="icon-linkedin"></span></a>
                            @endif
                        </div>
                        <form action="#" class="search-form d-inline-block">
                            <div class="d-flex">
                                <input type="email" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 d-block d-lg-none text-right">
                    </div>
                </div>
            </div>
            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li class="active">
                                    <a href="index.html" class="nav-link text-left">Home</a>
                                    </li>                                    
                                    <li>
                                        <a title="Blog" href="{{route('web.blog.artigos')}}" class="nav-link text-left">Blog</a>
                                    </li>                                    
                                    <li><a title="Atendimento" href="{{route('web.atendimento')}}" class="nav-link text-left">Atendimento</a></li>
                                    <li>
                                        <span style="color: limegreen" class="icon-whatsapp"></span>
                                            <a href="{{\App\Helpers\WhatsApp::getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}" class="nav-link text-left">{{$configuracoes->whatsapp}}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                        <p>
                            &copy; {{$configuracoes->ano_de_inicio}} - {{date('Y')}} <strong>{{$configuracoes->nomedosite}}</strong>. - Todos os direitos reservados. Feito com <i class="icon-heart text-danger" aria-hidden="true"></i>  por <a target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a>

                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery-ui.js')}}"></script>
    <script src="{{url('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{url('frontend/assets/js/aos.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
  
    <script src="{{url('frontend/assets/js/main.js')}}"></script>

    <script>
        $(function() {     
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });    
        });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZW4K12J5XR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-ZW4K12J5XR');
    </script>

    @hasSection('js')
        @yield('js')
    @endif
</body>
</html>