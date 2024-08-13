<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$order->name}} - Pedido #OS{{ str_pad($order->orderId, 4, "0", STR_PAD_LEFT) }} {{$order->created_at->format('d/m/Y H:i')}}</title>

        <style>
            *{
                padding: 0;
                border: 0;
                margin: 0;
                box-sizing: border-box;
                outline: none;
            }
            body{
                width: 100%;
                padding: 30px;
                font-family: sans-serif;
                color: #4b4b4b;
                display: block;
            }
            table td {
                vertical-align: top;
            }
            .flex{
                display: flex;
                width: 100%;
                flex-wrap: nowrap;
            }
            .col-inline { /* funciona como um float, mas esse e bom para deixar responsivo OBS: evite usar muito float, a menos que seja nescessário */
                display: inline-block;
                vertical-align: top;
                position: relative;
                margin-right: -3.8px;
            }
            .col-1 {
                width: 8.33%;
            }
            .col-2 {
                width: 16.67%;
            }
            .col-3 {
                width: 25%;
            }
            .col-4 {
                width: 33.33%;
            }
            .col-5 {
                width: 41.66%;
            }
            .col-6 {
                width: 50%;
            }
            .col-7 {
                width: 58.3%;
            }
            .col-8 {
                width: 66.7%;
            }
            .col-9 {
                width: 75%;
            }
            .col-10 {
                width: 83.28%;
            }
            .col-11 {
                width: 91.7%;
            }
            .col-12 {
                width: 100%;
            }
            .numeroPedido{
                color: #ff7e1c;
            }
            .numeroPedido span{
                color: #4b4b4b;
                font-size: 14px;
            }
            .idPagseguro{
                font-size: 13px;
                color: #707070;
            }
            .secDetalhesPedido{
                margin-top: 30px;
            }
            .ContTableCliente{
            }
            .secDetalhesPedido > .titulo{
                font-size: 19px;
                margin-top: 25px;
            }
            .secDetalhesPedido .tableCliente{
                display: block;
                width: 350px;
                margin-right: 20px;
                padding-right: 20px;
            }
            .secDetalhesPedido .tableCliente .titulo{
                font-size: 15px;
                background-color: #f5f5f5;
                padding: 5px;
                margin-bottom: 15px;
                padding-left: 15px;
            }
            .secDetalhesPedido .tableCliente .descricao{
                padding-left: 15px;
            }
            .secDetalhesPedido .tableCliente .descricao p{
                font-size: 14px;
                margin-bottom: 5px;
            }
            .secDetalhesPedido .tableCliente.infoPedidoGeral{
                padding-left: 0;
            }
            .secDetalhesPedido .tableCliente.infoPedidoGeral .descricao{
                margin-top: 15px;
                padding-left: 0;
                width: 350px;
                display: block;
            }
            #body, .secDetalhesPedido{
                display: block;
                width: 100%;
            }
            .itensPedido{
                width: 100%;
            }
            .itensPedido thead{
                background-color: #949494;
                color: #fff;
            }
            .itensPedido thead th{
                padding: 5px;
                border: 1px solid #fff;
            }
            .itensPedido tbody td{
                border: 1px solid #b8b8b8;
                padding: 5px;
                font-size: 14px;
            }
            .itensPedido tbody tr td:first-of-type{
                text-transform: lowercase
            }
            .avatar-xs{
                height: 1.8rem;
                width: 1.8rem;
                border-radius: 100%!important;
                display: block!important;
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <header id="header">
            <table width="100%">
                <tr>
                    <td>
                        <h3 class="numeroPedido">
                            Pedido #OS{{ str_pad($order->orderId, 4, "0", STR_PAD_LEFT) }}<br>
                            <span>Data: {{$order->created_at->format('d/m/Y H:i')}}</span>
                        </h3><br>
                        <h3 class="idPagseguro">Código autorização PagSeguro: {{$order->order_integration_id}}</h3>
                    </td>
                    <td>
                        <img src="{{base_path()}}/public/site/assets/images/logo.svg" width="150px" alt="" style="float: right;">
                    </td>
                </tr>
            </table>

        </header>
        <section id="body">
            <div class="secDetalhesPedido">
                <table class="ContTableCliente">
                    <tbody>
                        <tr>
                            <td>
                                <div class="tableCliente">
                                    <h3 class="titulo">Dados pessoais</h3>
                                    <div class="descricao">
                                        <p>{{$order->name}}</p>
                                        <p><b>CPF:</b> {{$order->cpf}}</p>
                                        <p><b>E-mail:</b> {{$order->email}}</p>
                                        <p><b>Tel:</b> {{$order->phone}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="tableCliente">
                                    <h3 class="titulo">Endereço de entrega</h3>
                                    <div class="descricao">
                                        <p>{{$order->name}}</p>
                                        <p>{{$order->public_place}}, {{$order->number}} - {{$order->region}}</p>
                                        <p>{{$order->city}} - {{$order->state}}</p>
                                        <p>Ponto de referência: {{$order->reference}}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h3 class="titulo" style="
                    background-color: #f5f5f5;
                    padding: 5px;
                    padding-left: 15px;
                ">Informações do Pedido</h3>
                <div class="tableCliente infoPedidoGeral">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="descricao">
                                        @switch($order->status)
                                            @case(0) <p><b>Status interno: </b>Aguardando Confirmação</p> @break
                                            @case(1) <p><b>Status interno: </b>Preparando</p> @break
                                            @case(2) <p><b>Status interno: </b>Enviado</p> @break
                                            @case(3) <p><b>Status interno: </b>Entregue</p> @break
                                            @case(4) <p><b>Status interno: </b>Devolvido</p> @break
                                            @case(5) <p><b>Status interno: </b>Recebido</p> @break
                                            @case(6) <p><b>Status interno: </b>Não Autorizado</p> @break
                                        @endswitch
                                        @switch($order->autorization)
                                            @case(1) <p><b>Status de pagamento: </b>Aguardando pagamento</p> @break;
                                            @case(2) <p><b>Status de pagamento: </b>Em análise</p> @break;
                                            @case(3) <p><b>Status de pagamento: </b>Paga</p> @break;
                                            @case(4) <p><b>Status de pagamento: </b>Disponível</p> @break;
                                            @case(5) <p><b>Status de pagamento: </b>Em disputa</p> @break;
                                            @case(6) <p><b>Status de pagamento: </b>Devolvida</p> @break;
                                            @case(7) <p><b>Status de pagamento: </b>Cancelada</p> @break;
                                            @case(8) <p><b>Status de pagamento: </b>Debitado</p> @break;
                                            @case(9) <p><b>Status de pagamento: </b>Retenção temporária</p> @break;
                                        @endswitch
                                        @switch($order->freight_type)
                                            @case('FG') <p><b>Tipo Frete:</b> Grátis</p> @break;
                                            @case('RL') <p><b>Tipo Frete:</b> Loja</p> @break;
                                            @case('FF') <p><b>Tipo Frete:</b> Fixo</p> @break;
                                            @default <p><b>Tipo Frete:</b> {{$order->freight_type}}</p> @break;
                                        @endswitch
                                        <p><b>Código Rastreio:</b> {{$order->restriction_code?:'--'}}</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="tableCliente">
                                        <div class="descricao">
                                            @php
                                                switch($order->payment_method){
                                                    case 1: $paymentMethod =  "Cartão de Crédito"; break;
                                                    case 2: $paymentMethod =  "Boleto"; break;
                                                    case 3: $paymentMethod =  "Débito online"; break;
                                                    case 4: $paymentMethod =  "Saldo PagSeguro"; break;
                                                }
                                            @endphp

                                            @switch($order->payment_method)
                                                @case(1)
                                                    <p><b>Metodo de Pagamento: </b>Cartão de Crédito</p>
                                                    <p><b>Bandeira: </b> {{$card->brand}}</p>
                                                    <p><b>Parcelas: </b> {{$card->parcel.'x'}}</p>
                                                @break
                                                @case(2) <p><b>Metodo de Pagamento: </b>Boleto bancário</p> @break
                                                @case(3) <p><b>Metodo de Pagamento: </b>Débito online</p> @break
                                                @case(4) <p><b>Metodo de Pagamento: </b>Saldo PagSeguro</p> @break
                                            @endswitch
                                            <p><b>Valor Frete: </b>R$ {{  number_format($order->freight,2,',','.')  }}</p>
                                            <p style="font-size: 16px;color: #ff7e1c;margin-top: 15px;">Valor Total: <b>R$ {{  number_format($order->amount,2,',','.')  }}</b></p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h3 class="titulo" style="
                    margin-bottom: 25px;
                    font-size: 16px;
                    background-color: #f5f5f5;
                    padding: 5px;
                    padding-left: 15px;
                ">Itens do Pedido</h3>
                <table class="itensPedido" width="500px" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Ref.</th>
                            <th>Qtd</th>
                            <th>Valor R$</th>
                            <th>Tamanho</th>
                            <th>Cor</th>
                            <th>Estampa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td width="200px"><b>{{ $item->title }}</b></td>
                            <td><b>{{ $item->reference_code }}</b></td>
                            <td>{{ $item->quantity }}</td>
                            <td>R$ {{ number_format($item->amount,2,',','.') }}</td>
                            <td>{{$item->size}}</td>
                            <td>
                                <div class="row" style="margin: 0 auto;display:table;">
                                    <i class="avatar-xs rounded-circle d-block mr-2" style="background-color: {{$item->color}}"></i>
                                </div>
                            </td>
                            <td>
                                @if ($item->attachment_image <> '')
                                    <div class="row" style="align-items: center; justify-content: center;">
                                        <i class="avatar-xs rounded-circle d-block mr-2" style="background: url({{base_path()}}/public/storage/admin/uploads/fotos/{{$item->attachment_image}}) center no-repeat; background-size: cover;"></i>
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>
