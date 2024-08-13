<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daducha - Moda Infantil</title>
    </head>
    <body style="width: 100%;">
        <table align="center" border="0" cellspacing="0" width="700px" style="margin:0 auto;background-color: #ffffff;color: rgb(36, 36, 36);font-family: Verdana;">
            <tbody style="background-color: #ffffff;">
                <tr>
                    <td colspan="2" style="text-align: center;border-bottom: 1px solid rgb(231, 231, 231);">
                        <div style="margin: 0 auto;display:table;padding: 20px;">
                            <img width="180px" src="{{asset('site/assets/images/logo.png')}}" alt="Daducha Moda infantil">
                        </div>
                        <div style="margin-top: 10px;padding-bottom: 15px;">
                            <h3 style="font-size: 18px; font-weight: normal;">Olá {{$order->customer_name}}!</h3>
                            <p style="font-weight: normal;font-size: 14px;">Seu pedido em <b>Daducha</b> teve uma alteração de status de pagamento.</p>
                        </div>
                    </td>
                </tr>
                <tr style="background-color:  #f58533;color: rgb(255, 255, 255);">
                    <td style="padding: 0 20px;">
                        <h4 style="font-size: 18px; font-weight: normal;margin-bottom: 10px;">Pedido <b>nº #OS{{ str_pad($order->id, 4, "0", STR_PAD_LEFT) }}</b></h3>
                        <h5 style="margin-top: 0;">Total do Pedido: R$ {{number_format($order->amount,2,',','.')}}</h5>
                    </td>
                    <td style="padding: 0 20px;">
                        <h4 style="font-size: 13px; font-weight: normal;">
                            Status do pedido
                            @switch($order->autorization)
                                @case (1):
                                    <b style="display: block;">Aguardando pagamento</b>
                                @break
                                @case (2):
                                    <b style="display: block;">Em análise</b>
                                @break
                                @case (3):
                                    <b style="display: block;">Autorizado</b>
                                @break
                                @case (4):
                                    <b style="display: block;">Disponível</b>
                                @break
                                @case (5):
                                    <b style="display: block;">Disputa em andamento</b>
                                @break
                                @case (6):
                                    <b style="display: block;">Pagamento estornado</b>
                                @break
                                @case (7):
                                    <b style="display: block;">Pagamento não aprovado</b>
                                @break
                                @case (8):
                                    <b style="display: block;">Pagamento autorizado</b>
                                @break
                                @case (9):
                                    <b style="display: block;">Entrou em retenção temporária</b>
                                @break
                            @endswitch
                            </b>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td width="50%" style="padding: 0 20px;border-right: 1px solid #dcdcdc;">
                        <h4>Inforamções de Pagamento</h4>
                        <ul style="list-style: none; padding-left: 0;">
                            @if ($card->id <> 0)
                                <li style="padding: 5px 0;">{{$card->holder_name}}</li>
                                <li style="padding: 5px 0;">{{substr($card->number, 0, 4)}}********{{substr($card->number, 12, 4)}}</li>
                                <li style="padding: 5px 0;">{{$card->brand}}</li>
                            @else
                                <li style="padding: 5px 0;">{{$order->customer_name}}</li>
                                <li style="padding: 5px 0;">{{$order->customer_phone}}</li>
                                <li style="padding: 5px 0;"><a href="{{$order->link_billet}}" target="_blank">2ª via do Boleto</a></li>
                            @endif
                        </ul>
                    </td>
                    <td width="50%" style="padding: 0 20px;">
                        <h4>Endereço de Entrega</h4>
                        <ul style="list-style: none; padding-left: 0;">
                            <li>
                                <p style="font-size: 14px; line-height: 23px;">
                                    {{$order->public_place}}
                                    {{$order->number}},
                                    {{$order->region}},
                                    {{$order->city}}-{{$order->state}}
                                    CEP: {{$order->zip_code}} -
                                    {{$order->complement}}
                                    {{$order->reference}}
                                </p>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0 20px;"><h4>Itens do Pedido</h4></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0 20px;padding-bottom: 30px;">
                        <ul style="display: flex; align-items: center;list-style: none;padding-left: 0;">
                            @foreach ($orderItems as $orderItem)
                            <li style="width: 48%;margin: 0 2%;padding: 15px;background-color: #f2f2f2;border-radius: 20px;">
                                {{$orderItem->title}}
                                <span style="display: block; font-size: 12px;margin-top: 10px;"><b>R$ {{number_format($orderItem->amount,2,',','.')}}</b></span>
                                <span style="display: block; font-size: 12px;margin-top: 10px;"><b>Quantidade: {{$orderItem->quantity}}</b></span>
                                @if ($orderItem->color)
                                    <span style="display: block; font-size: 12px;margin-top: 10px;"><b>Cor</b> <i style="background-color: {{$orderItem->color}}; width: 20px;height: 20px;display:inline-block;"></i></span>
                                @endif
                                @if ($orderItem->slogan)
                                    <span style="display: block; font-size: 12px;margin-top: 10px;"><b>Frase:</b> {{$orderItem->slogan}}</span>
                                @endif
                                @if ($orderItem->size)
                                    <span style="display: block; font-size: 12px;margin-top: 10px;"><b>Tamanho:</b> {{$orderItem->size}}</span>
                                @endif
                                @if ($orderItem->model)
                                    <span style="display: block; font-size: 12px;margin-top: 10px;"><b>Modelo:</b> {{$orderItem->model}}</span>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0 20px;"><p>Frete: R$ {{number_format($order->freight,2,',','.')}}</p></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding: 0 20px;text-align: center;font-size: 12px;background-color: #f58533;color: rgb(255, 255, 255);"><p>2020 © Todos os direitos reservados.</p></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
