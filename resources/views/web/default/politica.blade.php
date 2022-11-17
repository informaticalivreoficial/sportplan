@extends("web.{$configuracoes->template}.master.master")

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 single-content">  
                <h1 class="mb-4">
                    Política de Privacidade
                </h1>               
                {!! $configuracoes->politicas_de_privacidade !!}
            </div>
        </div>      
    </div>
</div>
@endsection