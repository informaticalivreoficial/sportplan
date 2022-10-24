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
    
    <!--============ Google Fonts ======-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,300" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet" type="text/css"/>

    <!--========= Style Sheets ============-->
    <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/pixeden-icons.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/owl.carousel.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/animations.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/dl-menu.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/main.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/renato.css')}}"/>
    <link rel="stylesheet" href="{{url('frontend/assets/css/font-awesome.min.css')}}" />

    <script src="{{url('frontend/assets/js/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{$configuracoes->getfaveicon()}}" type="image/x-icon" />

    @hasSection('css')
        @yield('css')
    @endif
</head>
<body>
    <div class="xv-overFlow">
        <!--Header -->
        <header class="style1 docHeader">  
            <nav id="sticktop" class="navbar navbar-default" style="background-color:rgba(0, 0, 0, 0.7);">
              <div class="container">
                <div class="navbar-header clearfix">
                    <a class="navbar-brand" href="{{route('web.home')}}">
                        <img src="{{$configuracoes->getLogomarca()}}" alt="{{$configuracoes->nomedosite}}"/>
                    </a>
                </div>
                <div class="social-wrap">
                    <ul class="social-list">
                        @if ($configuracoes->facebook)
                            <li><a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook" class="icon-facebook"></a></li>
                        @endif
                        @if ($configuracoes->twitter)
                            <li><a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter" class="icon-twitter"></a></li>
                        @endif
                        @if ($configuracoes->instagram)
                            <li><a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram" class="icon-instagram"></a></li>
                        @endif
                        @if ($configuracoes->linkedin)
                            <li><a target="_blank" href="{{$configuracoes->linkedin}}" title="linkedin" class="icon-linkedin"></a></li>
                        @endif 
                    </ul>
                </div>  
                  
                <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                    <button class="dl-trigger">Abrir Menu</button>                    
                    <ul class="dl-menu clearfix">
                        <li><a href="{{route('web.blog.artigos')}}">Blog</a></li>
                        @if (!empty($Paginas) && $Paginas->count() > 0 )
							<li class="parent"> <a >Páginas &nbsp;<img src="{{url('frontend/assets/images/seta.png')}}" /></a>
								<ul class="lg-submenu">
									@foreach ($Paginas as $page)										
                                        <li> <a href="{{route('web.pagina', [ 'slug' => $page->slug ])}}"><i class="fa fa-angle-double-right"></i> {{$page->titulo}}</a></li>						
									@endforeach																	
								</ul>
							</li>
						@endif 
                        @if (!empty($catnoticias) && $catnoticias->count() > 0 )
							<li class="parent"> <a >Modalidades &nbsp;<img src="{{url('frontend/assets/images/seta.png')}}" /></a>
								<ul class="lg-submenu">
									@foreach ($catnoticias as $catn)
										@if ($catn->countposts() >= 1)
											<li> <a href="{{route('web.blog.categoria', [ 'slug' => $catn->slug ])}}"><i class="fa fa-angle-double-right"></i> {{$catn->titulo}}</a></li>
										@endif										
									@endforeach																	
								</ul>
							</li>
						@endif 
                        <li><a href="{{route('web.atendimento')}}">Fale Conosco</a></li>       
                    </ul>
                </div>
              </div>
            </nav>                  
        </header> 
        <!-- Header -->
        
        @yield('content')
        
        <!--Footer-->
        <footer>
            <div class="container">
                <div class="footer_inner">
                    @if (!empty($versiculo))
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12">                	
                                <div class="widget widget_text">
                                    {{$versiculo}}
                                </div>
                            </div>                
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-lg-4">
                            <div class="widget widget">
                                {{$configuracoes->descricao}}
                            </div>
                        </div>
                    </div>

                    <div class="widget widget_menu">
                        <nav class="sitemap">
                            <ul>
                                <li><a href="{{route('web.politica')}}">Política de Privacidade</a></li>
                                <li><a href="{{route('web.atendimento')}}">Fale Conosco</a></li>
                                <li><a href="{{route('web.pesquisa')}}">Pesquisar no site</a></li>
                            </ul>
                        </nav>
                    </div>
                                
                    <div class="widget widget_newsletter">                
                        <form action="" method="post" class="form_newsletter j_submitnewsletter">                    
                            <div class="row">
                                <div class="col-md-12" style="padding: 0px;">
                                    @csrf                                
                                    <div id="js-newsletter-result"></div>
                                    <!-- HONEYPOT -->
                                    <input type="hidden" class="noclear" name="bairro" value="" />
                                    <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                    <input type="hidden" class="noclear" name="status" value="1" />
                                    <input type="hidden" class="noclear" name="nome" value="#Cadastrado pelo Site" />  
                                </div>
                            </div>
                            <div class="row form_hide">
                                <div class="col-xs-12 col-sm-8 col-md-10 col-lg-10" style="padding: 0px;">
                                    <input style="width: 100%;" type="text" name="email" placeholder="Receba Novidades por E-mail"/>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                                    <button type="submit" id="js-subscribe-btn" class="b_cadastro" style="width: 100%;">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="copyrights">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                  <ul class="social-list">
                                    @if ($configuracoes->facebook)
                                        <li><a target="_blank" href="{{$configuracoes->facebook}}" title="Facebook" class="icon-facebook"></a></li>
                                    @endif
                                    @if ($configuracoes->twitter)
                                        <li><a target="_blank" href="{{$configuracoes->twitter}}" title="Twitter" class="icon-twitter"></a></li>
                                    @endif
                                    @if ($configuracoes->instagram)
                                        <li><a target="_blank" href="{{$configuracoes->instagram}}" title="Instagram" class="icon-instagram"></a></li>
                                    @endif
                                    @if ($configuracoes->linkedin)
                                        <li><a target="_blank" href="{{$configuracoes->linkedin}}" title="linkedin" class="icon-linkedin"></a></li>
                                    @endif                                    
                                </ul>  
                            </div><!--column-->
                            <div class="col-xs-12 col-md-6">
                                <div class="rights">
                                    &copy; {{$configuracoes->ano_de_inicio}} - {{date('Y')}} <strong>{{$configuracoes->nomedosite}}</strong>. - Todos os direitos reservados.
                                    <p class="font-accent">
                                        <span class="small text-silver-dark">Feito com <i style="color:red;" class="fa fa-heart"></i> por <a style="color:#fff;" target="_blank" href="{{env('DESENVOLVEDOR_URL')}}">{{env('DESENVOLVEDOR')}}</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div><!--copyrights--> 
                </div>
            </div>
        </footer>
        <!--Footer-->
    </div>
    
    <!--=================================
    Script Source
    =================================-->
    <script src="{{url('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.dlmenu.js')}}"></script>
    <script src="{{url('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{url('frontend/assets/js/jquery.inview.js')}}"></script>
    <script src="{{url('frontend/assets/js/main.js')}}"></script>
    <script src="{{url('frontend/assets/js/bootstrap.js')}}"></script>

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