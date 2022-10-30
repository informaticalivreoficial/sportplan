@extends("web.{$configuracoes->template}.master.master")

@section('content')
{{--
<div class="site-section py-0">
    <div class="owl-carousel hero-slide owl-style">
        <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">
                    <div class="img-bg" style="background-image:url(images/xbig_img_1.jpg.pagespeed.ic.K2N7KNYATl.webp)"></div>
                    <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">
                    <div class="img-bg" style="background-image:url(images/xbig_img_1.jpg.pagespeed.ic.K2N7KNYATl.webp)"></div>
                    <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                            <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Notícias</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if(!empty($noticias && $noticias->count() > 0))
                        @foreach ($noticias as $key => $noticia)
                            @if ($key == 0)
                                <div class="col-md-6">
                                    <div class="post-entry-1">
                                        <a href="{{route('web.noticia', ['slug' => $noticia->slug ])}}">
                                            <img src="{{$noticia->cover()}}" alt="{{$noticia->titulo}}" class="img-fluid">
                                        </a>
                                        <h2><a href="{{route('web.noticia', ['slug' => $noticia->slug ])}}">{{$noticia->titulo}}</a></h2>
                                        <p>{!! $noticia->content_web !!}</p>
                                        <div class="post-meta">
                                            <span class="d-block"><a href="{{route('web.blog.categoria', [ 'slug' => $noticia->categoriaObject->slug ])}}">{{$noticia->categoriaObject->titulo}}</a></span>
                                            <span class="date-read">{{ Carbon\Carbon::parse($noticia->created_at)->formatLocalized('%d, %B %Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif                            
                        @endforeach
                        <div class="col-md-6">
                            @foreach ($noticias as $key => $noticia)
                                @if ($key != 0)
                                    <div class="post-entry-2 d-flex">
                                        <div class="thumbnail" style="background-image:url({{$noticia->cover()}})"></div>
                                        <div class="contents">
                                            <h2><a href="{{route('web.noticia', ['slug' => $noticia->slug ])}}">{{$noticia->titulo}}</a></h2>
                                            <div class="post-meta">
                                                <span class="d-block"><a href="{{route('web.blog.categoria', [ 'slug' => $noticia->categoriaObject->slug ])}}">{{$noticia->categoriaObject->titulo}}</a></span>
                                                <span class="date-read">{{ Carbon\Carbon::parse($noticia->created_at)->formatLocalized('%d, %B %Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                    
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="section-title">
                    <h2>Artigos</h2>
                </div>
                @if (!empty($artigos) && $artigos->count() > 0)
                    @php $i = 01; @endphp 
                    @foreach ($artigos as $artigo)                                           
                        <div class="trend-entry d-flex">
                            <div class="number align-self-start">0{{$i}}</div>
                            <div class="trend-contents">
                                <h2><a href="{{route('web.blog.artigo', ['slug' => $artigo->slug ])}}">{{$artigo->titulo}}</a></h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="{{route('web.blog.categoria', [ 'slug' => $artigo->categoriaObject->slug ])}}">{{$artigo->categoriaObject->titulo}}</a></span>
                                    <span class="date-read">{{ Carbon\Carbon::parse($artigo->created_at)->formatLocalized('%d, %B %Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                @endif
                <p>
                    <a href="{{route('web.blog.artigos')}}" class="more">Ver Mais Artigos <span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="site-section" style="padding: 3em 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Parceiros</h2>
                </div>               
            </div>     
            @if (!empty($parceiros) && $parceiros->count() > 0)
                @foreach ($parceiros as $parceiro)
                    <div class="col-lg-3">
                        <div class="post-entry-2 d-flex">
                            <a href="{{route('web.parceiro',['slug' => $parceiro->slug])}}">
                                <img src="{{$parceiro->cover()}}" class="img-fluid">    
                            </a>                    
                        </div>
                    </div>
                @endforeach                    
            @endif      
        </div>       
    </div>
</div>

<div class="site-section subscribe bg-light" style="padding: 3em 0;">
    <div class="container">
        <form action="" method="post" class="row align-items-center j_submitnewsletter">
            @csrf         
            <input type="hidden" class="noclear" name="bairro" value="" />
            <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
            <input type="hidden" class="noclear" name="status" value="1" />
            <input type="hidden" class="noclear" name="nome" value="#Cadastrado pelo Site" />
            <div class="col-md-5 mr-auto form_hide">
                <h2>Cadastre-se em nossa Newsletter</h2>
                <p>Receba novidades sobre nosso conteúdo de esportes em seu e-mail.</p>
            </div>
            <div class="col-md-6 ml-auto form_hide">
                <div id="js-newsletter-result"></div>
                <div class="d-flex">                    
                    <input type="email" class="form-control" name="email" placeholder="Digite seu E-mail">
                    <button type="submit" id="js-subscribe-btn" class="btn btn-secondary"><span class="icon-paper-plane"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(function() {     
            
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
@endsection