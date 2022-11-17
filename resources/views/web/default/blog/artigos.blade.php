@extends("web.{$configuracoes->template}.master.master")

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                            <h2>{{(!empty($posts) && $posts[0]->tipo == 'noticia' ? 'Notícias' : 'Blog')}}</h2>
                    </div>
                    @if($posts->count() && $posts->count() > 0)                 
                            @foreach($posts as $post)
                                <div class="post-entry-2 d-flex">
                                    <div class="thumbnail order-md-2" style="background-image: url('{{$post->cover()}}')"></div>
                                    <div class="contents order-md-1 pl-0">
                                        <h2><a href="{{route(($post->tipo == 'artigo' ? 'web.blog.artigo' : 'web.noticia'), ['slug' => $post->slug] )}}">{{$post->titulo}}</a></h2>
                                        <p class="mb-3">{!! Words($post->content, 19) !!}</p>
                                        <div class="post-meta">
                                            <span class="d-block"><a href="{{route('web.blog.categoria', [ 'slug' => $post->categoriaObject->slug ])}}">{{$post->categoriaObject->titulo}}</a></span>
                                            <span class="date-read">{{ Carbon\Carbon::parse($post->created_at)->formatLocalized('%d, %B %Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        
                        
                        <div class="row" style="padding: 20px;">
                            <div class="col-sm-12">
                                @if (isset($filters))
                                    {{ $posts->appends($filters)->links() }}
                                @else
                                    {{ $posts->links() }}
                                @endif
                            </div>                
                        </div>
                    @endif
                </div>        
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        .h {
            padding: 20px 20px 0 40px;
            background: #53c1ef;
            min-height: 75px;
            position: relative;
        }
        .pagination-custom{
            margin: 0;
            display: -ms-flexbox;
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }
        .pagination-custom li a {
            border-radius: 30px;
            margin-right: 8px;
            color:#7c7c7c;
            border: 1px solid #ddd;
            position: relative;
            float: left;
            padding: 6px 12px;
            width: 40px;
            height: 40px;
            text-align: center;
            line-height: 25px;
            font-weight: 600;
        }
        .pagination-custom>.active>a, .pagination-custom>.active>a:hover, .pagination-custom>li>a:hover {
            color: #fff;
            background: #007bff;
            border: 1px solid transparent;
        }
    </style>
@endsection