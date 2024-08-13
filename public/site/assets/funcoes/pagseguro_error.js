function erroPS($eV) {
    let $err = '';
    switch ($eV) {
        case "5003":
            $err = "Falha de comunicação com a instituição financeira";
            break;
        case "10000":
            $err = "Marca de cartão de crédito inválida";
            break;
        case "10001":
            $err = "Número do cartão de crédito com comprimento inválido";
            break;
        case "10002":
            $err = "Formato da data inválida";
            break;
        case "10003":
            $err = "Campo de segurança CVV inválido";
            break;
        case "10004":
            $err = "Código de verificação CVV é obrigatório";
            break;
        case "10006":
            $err = "Campo de segurança com comprimento inválido";
            break;
        case "53004":
            $err = "Quantidade inválida de itens";
            break;
        case "53005":
            $err = "É necessário informar a moeda";
            break;
        case "53006":
            $err = "Valor inválido para especificação da moeda";
            break;
        case "53007":
            $err = "Referência inválida comprimento: {0}";
            break;
        case "53008":
            $err = "URL de notificação inválida";
            break;
        case "53009":
            $err = "URL de notificação com valor inválido";
            break;
        case "53010":
            $err = "O e-mail do remetente é obrigatório";
            break;
        case "53011":
            $err = "Email do remetente com comprimento inválido";
            break;
        case "53012":
            $err = "Email do remetente está com valor inválido";
            break;
        case "53013":
            $err = "O nome do remetente é obrigatório";
            break;
        case "53014":
            $err = "Nome do remetente está com comprimento inválido";
            break;
        case "53015":
            $err = "Nome do remetente está com valor inválido";
            break;
        case "53017":
            $err = "Foi detectado algum erro nos dados do seu CPF";
            break;
        case "53018":
            $err = "O código de área do remetente é obrigatório";
            break;
        case "53019":
            $err = "Há um conflito com o código de área informado, em relação a outros dados seus";
            break;
        case "53020":
            $err = "É necessário um telefone do remetente";
            break;
        case "53021":
            $err = "Valor inválido do telefone do remetente";
            break;
        case "53022":
            $err = "É necessário o código postal do endereço de entrega";
            break;
        case "53023":
            $err = "Código postal está com valor inválido";
            break;
        case "53024":
            $err = "O endereço de entrega é obrigatório";
            break;
        case "53025":
            $err = "Endereço de entrega rua comprimento inválido: {0}";
            break;
        case "53026":
            $err = "É necessário o número de endereço de entrega";
            break;
        case "53027":
            $err = "Número de endereço de remessa está com comprimento inválido";
            break;
        case "53028":
            $err = "No endereço de entrega há um comprimento inválido";
            break;
        case "53029":
            $err = "O endereço de entrega é obrigatório";
            break;
        case "53030":
            $err = "Endereço de entrega está com o distrito em comprimento inválido";
            break;
        case "53031":
            $err = "É obrigatório descrever a cidade no endereço de entrega";
            break;
        case "53032":
            $err = "O endereço de envio está com um comprimento inválido da cidade";
            break;
        case "53033":
            $err = "É necessário descrever o Estado, no endereço de remessa";
            break;
        case "53034":
            $err = "Endereço de envio está com valor inválido";
            break;
        case "53035":
            $err = "O endereço do remetente é obrigatório";
            break;
        case "53036":
            $err = "O endereço de envio está com o país em um comprimento inválido";
            break;
        case "53037":
            $err = "O token do cartão de crédito é necessário";
            break;
        case "53038":
            $err = "A quantidade da parcela é necessária";
            break;
        case "53039":
            $err = "Quantidade inválida no valor da parcela";
            break;
        case "53040":
            $err = "O valor da parcela é obrigatório.";
            break;
        case "53041":
            $err = "Conteúdo inválido no valor da parcela";
            break;
        case "53042":
            $err = "O nome do titular do cartão de crédito é obrigatório";
            break;
        case "53043":
            $err = "Nome do titular do cartão de crédito está com o comprimento inválido";
            break;
        case "53044":
            $err = "O nome informado no formulário do cartão de Crédito precisa ser escrito exatamente da mesma forma que consta no seu cartão obedecendo inclusive, abreviaturas e grafia errada";
            break;
        case "53045":
            $err = "O CPF do titular do cartão de crédito é obrigatório";
            break;
        case "53046":
            $err = "O CPF do titular do cartão de crédito está com valor inválido";
            break;
        case "53047":
            $err = "A data de nascimento do titular do cartão de crédito é necessária";
            break;
        case "53048":
            $err = "TA data de nascimento do itular do cartão de crédito está com valor inválido";
            break;
        case "53049":
            $err = "O código de área do titular do cartão de crédito é obrigatório";
            break;
        case "53050":
            $err = "Código de área de suporte do cartão de crédito está com valor inválido";
            break;
        case "53051":
            $err = "O telefone do titular do cartão de crédito é obrigatório";
            break;
        case "53052":
            $err = "O número de Telefone do titular do cartão de crédito está com valor inválido";
            break;
        case "53053":
            $err = "É necessário o código postal do endereço de cobrança";
            break;
        case "53054":
            $err = "O código postal do endereço de cobrança está com valor inválido";
            break;
        case "53055":
            $err = "O endereço de cobrança é obrigatório";
            break;
        case "53056":
            $err = "A rua, no endereço de cobrança está com comprimento inválido";
            break;
        case "53057":
            $err = "É necessário o número no endereço de cobrança";
            break;
        case "53058":
            $err = "Número de endereço de cobrança está com comprimento inválido";
            break;
        case "53059":
            $err = "Endereço de cobrança complementar está com comprimento inválido";
            break;
        case "53060":
            $err = "O endereço de cobrança é obrigatório";
            break;
        case "53061":
            $err = "O endereço de cobrança está com tamanho inválido";
            break;
        case "53062":
            $err = "É necessário informar a cidade no endereço de cobrança";
            break;
        case "53063":
            $err = "O item Cidade, está com o comprimento inválido no endereço de cobrança";
            break;
        case "53064":
            $err = "O estado, no endereço de cobrança é obrigatório";
            break;
        case "53065":
            $err = "No endereço de cobrança, o estado está com algum valor inválido";
            break;
        case "53066":
            $err = "O endereço de cobrança do país é obrigatório";
            break;
        case "53067":
            $err = "No endereço de cobrança, o país está com um comprimento inválido";
            break;
        case "53068":
            $err = "O email do destinatário está com tamanho inválido";
            break;
        case "53069":
            $err = "Valor inválido do e-mail do destinatário";
            break;
        case "53070":
            $err = "A identificação do item é necessária";
            break;
        case "53071":
            $err = "O ID do ítem está inválido";
            break;
        case "53072":
            $err = "A descrição do item é necessária";
            break;
        case "53073":
            $err = "Descrição do item está com um comprimento inválido";
            break;
        case "53074":
            $err = "É necessária quantidade do item";
            break;
        case "53075":
            $err = "Quantidade do item está irregular";
            break;
        case "53076":
            $err = "Há um valor inválido na quantidade do item";
            break;
        case "53077":
            $err = "O valor do item é necessário";
            break;
        case "53078":
            $err = "O Padrão do valor do item está inválido";
            break;
        case "53079":
            $err = "Valor do item está irregular";
            break;
        case "53081":
            $err = "O remetente está relacionado ao receptor! Esse é um erro comum que só o lojista pode cometer ao testar como compras. O erro surge quando uma compra é realizada com os mesmos dados cadastrados para receber os pagamentos da loja ou com um e-mail que é administrador da loja";
            break;
        case "53084":
            $err = "Receptor inválido! Esse erro decorre de quando o lojista usa dados relacionados com uma loja ou um conta do PagSeguro, como e-mail principal da loja ou o e-mail de acesso à sua conta não PagSeguro";
            break;
        case "53085":
            $err = "Método de pagamento indisponível";
            break;
        case "53086":
            $err = "A quantidade total do carrinho está inválida";
            break;
        case "53087":
            $err = "Dados inválidos do cartão de crédito";
            break;
        case "53091":
            $err = "O Hash do remetente está inválido";
            break;
        case "53092":
            $err = "A Bandeira do cartão de crédito não é aceita";
            break;
        case "53095":
            $err = "Tipo de transporte está com padrão inválido";
            break;
        case "53096":
            $err = "Padrão inválido no custo de transporte";
            break;
        case "53097":
            $err = "Custo de envio irregular";
            break;
        case "53098":
            $err = "O valor total do carrinho não pode ser negativo";
            break;
        case "53099":
            $err = "Montante extra inválido";
            break;
        case "53101":
            $err = "Valor inválido do modo de pagamento. O correto seria algo do tipo default e gateway";
            break;
        case "53102":
            $err = "Valor inválido do método de pagamento. O correto seria algo do tipo Credicard, Boleto, etc.";
            break;
        case "53104":
            $err = "O custo de envio foi fornecido, então o endereço de envio deve estar completo";
            break;
        case "53105":
            $err = "As informações do remetente foram fornecidas, portanto o e-mail também deve ser informado";
            break;
        case "53106":
            $err = "O titular do cartão de crédito está incompleto";
            break;
        case "53109":
            $err = "As informações do endereço de remessa foram fornecidas, portanto o e-mail do remetente também deve ser informado";
            break;
        case "53110":
            $err = "Banco EFT é obrigatório";
            break;
        case "53111":
            $err = "Banco EFT não é aceito";
            break;
        case "53115":
            $err = "Valor inválido da data de nascimento do remetente";
            break;
        case "53117":
            $err = "Valor inválido do cnpj do remetente";
            break;
        case "53122":
            $err = "O domínio do email do comprador está inválido. Você deve usar algo do tipo @sandbox.pagseguro.com.br";
            break;
        case "53140":
            $err = "Quantidade de parcelas fora do limite. O valor deve ser maior que zero";
            break;
        case "53141":
            $err = "Este remetente está bloqueado";
            break;
        case "53142":
            $err = "O cartão de crédito está com o token inválido";
            break;
        case "30400":
            $err = "Opss!! Os dados do cartão não são válidos ou a operadora não autorizou a transação. Verifique seus dados ou entre em contato com su financeira.";
            break;
    }
    return $err;
}