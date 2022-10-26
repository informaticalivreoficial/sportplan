<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>        
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
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

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}" type="image/x-icon" />

    <link id="default-css" href="{{url('frontend/assets/css/style.css')}}" rel="stylesheet" media="all" />
    <link id="shortcodes-css" href="{{url('frontend/assets/css/shortcodes.css')}}" rel="stylesheet" media="all" />
    <link id="fancy-box" href="{{url('frontend/assets/css/jquery.fancybox.css')}}" rel="stylesheet" media="all" />
    <link id="layer-slider" href="{{url('frontend/assets/css/layerslider.css')}}" rel="stylesheet" media="all" />
    <link href="{{url('frontend/assets/css/prettyPhoto.css')}}" rel="stylesheet" media="all" />

    <link href="{{url('frontend/assets/css/responsive.css')}}" rel="stylesheet" media="all" />
    <link href="{{url('frontend/assets/css/pace-theme-loading-bar.css')}}" rel="stylesheet" media="all" />
    <link href="{{url('frontend/assets/css/animations.css')}}" rel="stylesheet" media="all" />

    <link rel="stylesheet" href="{{url('frontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/css/renato.css')}}">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel='stylesheet' type='text/css'>

    @hasSection('css')
        @yield('css')
    @endif
</head>
<body>
    <div class="wrapper">
        <div class="inner-wrapper">

            <div id="header-wrapper">
                <header id="header">
                    <div class="top-bar">
                        <div class="container">
                            <div class="dt-sc-contact-info">
                                @if ($configuracoes->whatsapp)
                                    <p>
                                        <i class="fa fa-whatsapp">
                                        Dúvidas? <span><a href="{{\App\Helpers\WhatsApp::getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}">WhatsApp: {{$configuracoes->whatsapp}}</a></span>
                                    </p>                       
                                @endif                                
                            </div>
                            <div class="top-right">
                                <ul>                                     
                                    <p>
                                        <span style="margin-right: 10px;">Olá, </span>  
                                        <a title="Minha Conta" href=""> 
                                            <span class="fa fa-user"></span> Minha Conta 
                                        </a>
                                        <span style="margin-left: 10px;">
                                            <a href="">Sair</a>
                                        </span>
                                    </p>                                    
                                    <li>
                                        <a title="Login" href="">
                                            <span class="fa fa-sign-in"></span>Logar
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Cadastrar-se" href="">
                                            <span class="fa fa-user"></span> Cadastre-se 
                                        </a>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="main-menu-container">
                        <div class="main-menu">
                            <div id="logo">
                                <a title="{{$configuracoes->nomedosite}}" href="{{route('web.home')}}">
                                    <img title="{{$configuracoes->nomedosite}}" alt="{{$configuracoes->nomedosite}}" src="{{$configuracoes->getLogomarca()}}">
                                </a>
                            </div>
                            <div id="primary-menu">
                                <div class="dt-menu-toggle" id="dt-menu-toggle">Menu<span class="dt-menu-toggle-icon"></span></div>
                                <nav id="main-menu">
                                    <ul id="menu-main-menu" class="menu">                                        
                                        <li class="menu-item-simple-parent menu-item-depth-0"><a target="" href=""> $link['nome'];</a>
                                            <ul class="sub-menu">                                            
                                                <li><a target="" href=""> $sublink['nome'];</a></li>                                            
                                            </ul>  
                                            <a class="dt-menu-expand">+</a>
                                        </li>                                        
                                        <li class="menu-item-simple-parent menu-item-depth-0"><a title="Blog" href="">Planos</a></li>
                                        <li class="menu-item-simple-parent menu-item-depth-0"><a title="Blog" href="{{route('web.blog.artigos')}}">Blog</a></li>
                                        <li class="menu-item-simple-parent menu-item-depth-0"><a title="Atendimento" href="{{route('web.atendimento')}}">Atendimento</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            @yield('content')

            <footer id="footer">
                <div class="footer-widgets-wrapper">
                    <div class="container">
                        <div class="column dt-sc-one-fourth first">
                            <aside class="widget widget_text">
                                <div class="textwidget">
                                    <h3 class="widgettitle">
                                        <span class="fa fa-user"></span>{{$configuracoes->nomedosite}}
                                    </h3>
                                    {{$configuracoes->descricao}}
                                </div>
                            </aside>
                        </div>
                        <div class="column dt-sc-one-fourth space">
                            <aside class="widget widget_text">
                                <h3 class="widgettitle">
                                    <span class="fa fa-link"></span>Acesse
                                </h3>
                                <div class="textwidget">
                                    <ul>
                                        <li><a href="{{route('web.politica')}}">Política de Privacidade</a></li>
                                        <li><a href="{{route('web.atendimento')}}">Fale Conosco</a></li>
                                        <li><a href="{{route('web.pesquisa')}}">Pesquisar no site</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        
                        <div class="column dt-sc-one-half  space ">
                            <div class="fb-page" data-href="https://www.facebook.com/sportplantriathlon/" data-tabs="" data-width="380" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/sportplantriathlon/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sportplantriathlon/">Sportplan Triathlon</a></blockquote></div>
                        </div>
                    </div>
                    <div class="social-media-container">
                        <div class="social-media">
                            <div class="container">
                                <div class="dt-sc-contact-info dt-phone">
                                    @if ($configuracoes->whatsapp)
                                            <p>
                                                <i class="fa fa-whatsapp"><a href="{{\App\Helpers\WhatsApp::getNumZap($configuracoes->whatsapp ,'Atendimento '.$configuracoes->nomedosite)}}">WhatsApp: {{$configuracoes->whatsapp}}</a>
                                            </p>                       
                                    @endif
                                </div>
                                <ul class="dt-sc-social-icons">
                                    @if ($configuracoes->facebook)
                                        <li class="facebook"><a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook" ><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <li class="twitter"><a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter" ><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <li class="instagram"><a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram" ><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if ($configuracoes->linkedin)
                                        <li class="linkedin"><a target="_blank" href="{{$configuracoes->linkedin}}" title="linkedin" ><i class="fa fa-linkedin"></i></a></li>
                                    @endif                                        
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="container">
                        <ul class="footer-links">
                            <!--<li><a href="#"> About Us </a></li>
                            <li><a href="#"> Help Centre </a></li>
                            <li><a href="#"> Site Map </a></li>-->
                        </ul>
                        <p>&copy; {{$configuracoes->ano_de_inicio}} - {{date('Y')}} <strong>{{$configuracoes->nomedosite}}</strong>. - Todos os direitos reservados.</p>
                        <span class="small text-silver-dark">Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a></span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    <!--=================================
    Script Source
    =================================-->
    <script src="{{url('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery-migrate.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/modernizr.custom.js')}}"></script>
    <script>
    var mytheme_urls = {
            stickynav : 'enable'
    };
    </script>

    <!-- Scripts -->
    <script src="{{url('frontend/assets/js/jquery.plugins.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>
    <script src="{{url('frontend/assets/js/pace.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.isotope.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.tipTip.minified.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.tabs.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.ui.totop.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery-transit-modified.js')}}"></script>
    <script src="{{url('frontend/assets/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <script src="{{url('frontend/assets/js/greensock.js')}}"></script>
    <script src="{{url('frontend/assets/js/layerslider.transitions.js')}}"></script>
    <script>
        var lsjQuery = jQuery;
    </script>
    <script> 
        lsjQuery(document).ready(function() { 
            if(typeof lsjQuery.fn.layerSlider == "undefined") { 
                lsShowNotice('layerslider_5','jquery'); 
            } else { 
                lsjQuery("#layerslider_5").layerSlider({
                    responsiveUnder: 1240, 
                    layersContainer: 1170, 
                    skinsPath: 'js/layerslider/skins/'
                }) 
            } 
        }); 
    </script>
    <script src="{{url('frontend/assets/js/retina.js')}}"></script>
    <script src="{{url('frontend/assets/js/twitter/jquery.tweet.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.validate.min.js')}}"></script>

    <script src="{{url('frontend/assets/js/custom.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.maskedinput.min.js')}}"></script>

    <!-- jQuery REMODAL -->
    <link rel="stylesheet" href="{{url('frontend/assets/js/remodal/remodal.css')}}">
    <link rel="stylesheet" href="{{url('frontend/assets/js/remodal/remodal-default-theme.css')}}">
    <script src="{{url('frontend/assets/js/remodal/remodal.js')}}"></script>

    <!--jquery form-->
    <script src="{{url('frontend/assets/js/jquery.form.js')}}"></script>

    <script>
        $(function () {
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            // Seletor, Evento/efeitos, CallBack, Ação
            $('.j_submitnewsletter').submit(function (){
                var form = $(this);
                var dataString = $(form).serialize();
    
                $.ajax({
                    url: "{{ route('web.sendNewsletter') }}",
                    data: dataString,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function(){
                        form.find("#js-subscribe-btn").attr("disabled", true);
                        form.find('#js-subscribe-btn').html("Carregando...");                
                        form.find('.alert').fadeOut(500, function(){
                            $(this).remove();
                        });
                    },
                    success: function(response){
                        $('html, body').animate({scrollTop:$('#js-newsletter-result').offset().top-40}, 'slow');
                        if(response.error){
                            form.find('#js-newsletter-result').html('<div class="alert alert-danger error-msg">'+ response.error +'</div>');
                            form.find('.error-msg').fadeIn();                    
                        }else{
                            form.find('#js-newsletter-result').html('<div class="alert alert-success error-msg">'+ response.sucess +'</div>');
                            form.find('.error-msg').fadeIn();                    
                            form.find('input[class!="noclear"]').val('');
                            form.find('.form_hide').fadeOut(500);
                        }
                    },
                    complete: function(response){
                        form.find("#js-subscribe-btn").attr("disabled", false);
                        form.find('#js-subscribe-btn').html("Cadastrar");                                
                    }
    
                });
    
                return false;
            });
    
        });
    </script>

    @hasSection('js')
        @yield('js')
    @endif
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$configuracoes->tagmanager_id}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', '{{$configuracoes->tagmanager_id}}');
    </script>
</body>
</html>