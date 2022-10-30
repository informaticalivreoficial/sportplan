@extends("web.{$configuracoes->template}.master.master")

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 single-content">          
                <p class="mb-5">
                    <img src="{{$post->cover()}}" alt="{{$post->titulo}}" class="img-fluid">
                </p>  
                <h1 class="mb-4">
                    {{$post->titulo}}
                </h1>
                <div class="post-meta d-flex mb-5">
                    <div class="vcard">
                        <div class="shareInner">
                            <!-- Social list -->
                            <div id="shareIcons"></div>
                        </div>
                    </div>
                </div>
                <p>{{$post->thumb_legenda}}</p>
                {!!$post->content!!}
                @if($post->images()->get()->count()) 
                    <div class="row">                   
                        @foreach($post->images()->get() as $image)  
                            <figure style="float:left;padding-left:10px;padding-top:10px;margin-bottom:20px;">
                                <a href="{{ $image->url_image }}" rel="shadowbox[Galeria]">
                                    <img width="150" src="{{ $image->url_cropped }}"  alt="{{ $post->titulo }}"/>
                                </a>
                            </figure>                                             
                        @endforeach 
                    </div>                               
                @endif

                @if(!empty($postsTags) && $postsTags->count() > 0)  
                    <div class="pt-5">
                        <p>
                            @foreach($postsTags as $posttags) 
                                @php
                                    $array = explode(",", $posttags->tags);
                                    foreach($array as $tags){
                                        $tag = trim($tags); 
                                        if($posttags->tipo == 'artigo'){
                                            echo '<a href="'.route('web.blog.artigo',['slug' => $posttags->slug]).'">';
                                        }else{
                                            echo '<a href="'.route('web.noticia',['slug' => $posttags->slug]).'">';
                                        }    
                                        echo '#'.$tag;
                                        echo '</a>, ';
                                    }
                                @endphp                                                     
                            @endforeach 
                        </p>
                    </div>
                @endif   
            </div>

            <div class="col-lg-3 ml-auto">
                <div class="section-title">
                    <h2>Recentes</h2>
                </div>
                @if (!empty($postsMais) && $postsMais->count() > 0)  
                    @php $i = 1; @endphp               
                    @foreach ($postsMais as $postmais)
                        <div class="trend-entry d-flex">
                            <div class="number align-self-start">0{{$i}}</div>
                            <div class="trend-contents">
                                <h2><a href="{{route(($postmais->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $postmais->slug] )}}">{{$postmais->titulo}}</a></h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="{{route('web.blog.categoria', [ 'slug' => $postmais->categoriaObject->slug ])}}">{{$postmais->categoriaObject->titulo}}</a></span>
                                    <span class="date-read">{{ Carbon\Carbon::parse($postmais->created_at)->formatLocalized('%d, %B %Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @php $i++ @endphp                       
                    @endforeach                    
                @endif                
                <p>
                    <a href="{{route(($post->tipo == 'artigo' ? 'web.blog.artigos' : 'web.noticias') )}}" class="more">Ver Tudo <span class="icon-keyboard_arrow_right"></span></a>
                </p>
            </div>
        </div>      
    </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{url('frontend/assets/js/jsSocials/jssocials.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/assets/js/jsSocials/jssocials-theme-flat.css')}}" />
    <link rel="stylesheet" href="{{url('frontend/assets/js/shadowbox/shadowbox.css')}}"/>
    <style>
        .shareInner a{
            color: white;
        }
    </style>
@endsection

@section('js')
    <script src="{{url('frontend/assets/js/shadowbox/shadowbox.js')}}"></script>       
    <script type="text/javascript">
        Shadowbox.init({
            language: 'pt',
            players: ['img', 'html', 'iframe', 'qt', 'swf', 'flv'],
        });
    </script>

    <script src="{{url('frontend/assets/js/jsSocials/jssocials.min.js')}}"></script>
    <script>
        (function ($) {            
            $('#shareIcons').jsSocials({
                //url: "http://www.google.com",
                showLabel: false,
                showCount: false,
                shareIn: "popup",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });
            $('.shareIcons').jsSocials({
                //url: "http://www.google.com",
                showLabel: false,
                showCount: false,
                shareIn: "popup",
                shares: ["email", "twitter", "facebook", "whatsapp"]
            });  
        
        })(jQuery); 
    </script>    
@endsection