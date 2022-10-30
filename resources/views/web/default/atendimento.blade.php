@extends("web.{$configuracoes->template}.master.master")

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title mb-5">
                    <h2>Atendimento</h2>
                </div>
                <form method="post" action="" class="j_formsubmit" autocomplete="off">  
                        @csrf                  
                        <div class="row">
                            <div class="col-md-12 form-group">                                
                                <div id="js-contact-result"></div>
                                <!-- HONEYPOT -->
                                <input type="hidden" class="noclear" name="bairro" value="" />
                                <input type="text" class="noclear" style="display: none;" name="cidade" value="" />
                            </div>
                            <div class="col-md-6 form-group form_hide">
                                <label for="fname">Nome</label>
                                <input type="text" id="fname" name="nome" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-6 form-group form_hide">
                                <label for="eaddress">Email</label>
                                <input type="text" id="eaddress" name="email" class="form-control form-control-lg">
                            </div>
                        </div>                       
                        <div class="row form_hide">
                            <div class="col-md-12 form-group">
                                <label for="message">Mensagem</label>
                                <textarea name="mensagem" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row form_hide">
                            <div class="col-12">
                                <input type="submit" id="js-contact-btn" value="Enviar Agora" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>                    
                </form>
            </div>            
        </div>      
    </div>
</div> 
@endsection

@section('js')
<script>
    $(function () {
        $('.j_formsubmit').submit(function (){
            var form = $(this);
            var dataString = $(form).serialize();

            $.ajax({
                url: "{{ route('web.sendEmail') }}",
                data: dataString,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(){
                    form.find("#js-contact-btn").attr("disabled", true);
                    form.find('#js-contact-btn').val("Carregando...");                
                    form.find('.alert').fadeOut(500, function(){
                        $(this).remove();
                    });
                },
                success: function(resposta){
                    $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-140}, 'slow');
                    if(resposta.error){
                        form.find('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                        form.find('.error-msg').fadeIn();                    
                    }else{
                        form.find('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                        form.find('.error-msg').fadeIn();                    
                        form.find('input[class!="noclear"]').val('');
                        form.find('textarea[class!="noclear"]').val('');
                        form.find('.form_hide').fadeOut(500);
                    }
                },
                complete: function(resposta){
                    form.find("#js-contact-btn").attr("disabled", false);
                    form.find('#js-contact-btn').val("Enviar Agora");                                
                }
            });

            return false;
        });
    });
</script>   
@endsection