@extends("web.{$configuracoes->template}.master.master")

@section('content')

    <div id="main">
        <div id="main-content">

            <div class="dt-sc-hr-invisible-medium"></div>
                <div class="fullwidth-section">
                    <div class="container">
                        <div class="newsletter-container">
                            <h2>Cadastre-se em nossa Newsletter</h2>
                            <div class="dt-sc-one-half column first">
                                <p>Receba novidades sobre nosso conteúdo de esportes em seu e-mail.</p>
                            </div>
                            <div class="dt-sc-one-half column last">
                                <form class="newsletter-form j_submitnewsletter" action="" method="post">
                                    <div class="alertas"></div>
                                    <div class="form_hide">
                                        @csrf                                
                                        <div id="js-newsletter-result"></div>
                                        <!-- HONEYPOT -->
                                        <input type="hidden" class="noclear" name="bairro" value="" />
                                        <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                                        <input type="hidden" class="noclear" name="status" value="1" />
                                        <input type="hidden" class="noclear" name="nome" value="#Cadastrado pelo Site" />
                                        <input placeholder="Digite seu E-mail" name="email" type="email">
                                        <input class="dt-sc-button medium warning" id="js-subscribe-btn" data-hover="Cadastrar" value="Cadastrar" type="submit">                    
                                    </div>
                                </form>                
                            </div>
                        </div>
                    </div>
                </div>
            <div class="dt-sc-hr-invisible-large"></div> 
        </div>
    </div>
@endsection