function enviaEmailAjax(botaoEnvia){
    
    var formdata = new FormData($(botaoEnvia).parents('form')[0]);
    
    var arquivoAlvo = $(botaoEnvia).parents('form').attr('action');
    var mensagemFeedback = $(botaoEnvia).attr('data-mensagem');
	
	if(mensagemFeedback == '' || mensagemFeedback == null){
		var mensagemFeedback = 'Sua mensagem foi enviada com Sucesso';
	}
    
	//console.log(arquivoAlvo);
    //console.log(mensagemFeedback);
    
	// CRIA UM ARRAY PARA VERIFICAÇÃO DE CAMPOS
    var arrNameInputs = [];       
    
    $(botaoEnvia).parents('form').find('.campo.required').each(function(){
        
        var refCampo = $(this).attr('id');
        var nameInput = $(this).val();
        
        if(refCampo == 'empresa'){
            var result = nameInput.indexOf('@') > -1;
            console.log(result);
        }
        
        arrNameInputs.push(nameInput);
    });
        
    //console.log(arrNameInputs);
    
	// VERIFICA SE EXISTE ALGUM CAMPO VAZIL
    var erro = 0;
    
    for(var i=0;i<arrNameInputs.length;i++){
        if(arrNameInputs[i]==="" || arrNameInputs[i]===null){            
            erro++;           
        } 
    }
    if(erro>0){
        $('#loadingEmail').remove();
        $('body').append('<div id="loadingEmail" class="trans-slow"><div class="container"><div class="central"><img src="'+$url+'images/pencil.svg"/> Preencha todos os Campos </div></div></div>');
        setTimeout(function(){
            $('#loadingEmail').addClass('active');
            setTimeout(function(){
                $('#loadingEmail').removeClass('active');
            },3000);
        },300);
        return false;
    }else{
        
        $.ajax({
            type: 'POST',
            url: arquivoAlvo,
            beforeSend: function() {
                $('#loadingEmail').remove();
                $('body').append('<div id="loadingEmail" class="trans-slow"><div class="container"><div class="central"><img src="'+$url+'images/typing.svg"/> Enviando </div></div></div>');
                setTimeout(function(){
                    $('#loadingEmail').addClass('active');
                },300);
                
                $(botaoEnvia).addClass('inativo');
            },
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data){
                console.log(data);
                $(botaoEnvia).removeClass('inativo');
                $('#loadingEmail').remove();
                if(data === 'success'){
                    $(botaoEnvia).parents('form').find('input').val('');
                    $(botaoEnvia).parents('form').find('textarea').val('');
                    $(botaoEnvia).parents('form').find('#recaptcha input').val('inativo');
                    $(botaoEnvia).parents('form').find('#recaptcha a').removeClass('verif');
                    $('body').append('<div id="loadingEmail" class="trans-slow success"><div class="container"><div class="central"><img src="'+$url+'images/ok.svg"/> '+mensagemFeedback+' </div></div></div>');
                    setTimeout(function(){
                        $('#loadingEmail').addClass('active');
                        setTimeout(function(){
                            $('#loadingEmail').removeClass('active');
                        },2000);
                    },300);
                }else if(data === 'erro-captch'){
                    $('body').append('<div id="loadingEmail" class="trans-slow"><div class="container"><div class="central"><img src="'+$url+'images/pencil.svg"/> Campo de verificação obrigatório </div></div></div>');
                    setTimeout(function(){
                        $('#loadingEmail').addClass('active');
                        setTimeout(function(){
                            $('#loadingEmail').removeClass('active');
                        },3000);
                    },300);
                }else{
                    var mensagemErro = 'Lamentamos o ocorrido, atualize a página e tente enviar novamente a mensagem.';
                    $('body').append('<div id="loadingEmail" class="trans-slow error"><div class="container"><div class="central"><img src="'+$url+'images/warn.svg"/> Mensagem não enviada com sucesso. <p>'+mensagemErro+'</p> </div></div></div>');
                    setTimeout(function(){
                        $('#loadingEmail').addClass('active');
                        setTimeout(function(){
                            $('#loadingEmail').removeClass('active');
                        },3000);
                    },300);
                }
            }
        });
    }
    ////console.log(tituloPagina);
}
//enviaEmailAjax();