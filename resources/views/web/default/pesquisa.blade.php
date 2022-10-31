@extends("web.{$configuracoes->template}.master.master")

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span class="caption d-block small">Pesquisa no site</span>
                    <h2>Resultado da pesquisa por {{$search}}</h2>
                </div>
                @if ($search && !empty($data) && count($data) > 0)
                    @foreach ($data as $item)
                        <div class="post-entry-2 d-flex">
                            <div class="contents order-md-1 pl-0">
                                <h2><a href="{{$item['link']}}">{{$item['titulo']}}</a></h2>
                                <p class="mb-1">{!! Words($item['desc'], 30) !!}</p>                                
                            </div>
                        </div>                                                   
                    @endforeach
                    <div class="paging">
                        {{$data->links()}}                            
                    </div>
                @endif                
            </div>
        </div>
    </div>
  </div>
  @endsection