@extends('site.layouts.app')
@section('content')
    <section id="sec-pedido-finalizado" class="secao">
        <div class="wrap">
            <div class="header-pedido-finalizado">
                <h3 class="titulo">Pedido finalizado com sucesso</h3>
                <p>
                    Obrigado por comprar na nossa loja. <br>
                    @if ($order->link_billet <> '')
                        Para imprimir o boleto clique no botão abaixo, o mesmo será enviado para o e-mail cadastrado.<br>
                    @else
                        Seu pedido está sendo processado pelo pagseguro, um e-mail de confirmação de pagamento será enviado <br>
                    @endif
                    Para mais informações sobre o seu pedido visite sua área do cliente
                    <a href="{{route('customer.home')}}"></a>
                </p>
            </div>
            <div class="cont-pedido-finalizado">
                @if ($order->link_billet <> '')
                <a href="{{$order->link_billet}}" target="_blank" rel="noopener noreferrer" class="col-inline btn-interacao radius-med">Imprimir Boleto</a>
                @endif
                <a href="{{route('site.product')}}" style="background-color: #8c8c8c;" class="col-inline btn-interacao radius-med">Continuar Comprando</a>
                <a href="{{route('customer.home')}}" style="background-color: #8c8c8c;" class="col-inline btn-interacao radius-med">Área do Cliente</a>
            </div>
        </div>
    </section>
@endsection
