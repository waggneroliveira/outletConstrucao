@extends('site.layouts.app')
@section('content')
    <section id="meus_dados" class="secao">
        <div class="wrap">
            <div id="menu-dado" class="col-inline col-3">
                <h4 class="titulo"><b>Olá,</b>{{explode(' ', auth('customer')->user()->name)[0]}}</h4>
                <nav>
                    <ul>
                        <li class="trans-slow click-dado ">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/user.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.profile.show')}}" class="col-inline"> Meus dados</a>
                        </li>
                        <li class="trans-slow click-dado ">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/marker.png')}}" alt="">
                            </div>
                            <a href="{{route('site.address.index')}}" class="col-inline click-ajax">Meus endereços</a>
                        </li>
                        <li class="trans-slow click-dado active">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/pedidoo.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.login')}}" class="col-inline">Meus Pedidos</a>
                        </li>
                        <li class="trans-slow click-dado ">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/coracao.png')}}" alt="">
                            </div>
                            <a href="{{route('site.customer.favorites')}}" class="col-inline">Favoritos</a>
                        </li>
                        <li class="trans-slow click-dado ">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/aju.png')}}" alt="">
                            </div>
                            <a href="{{route('site.help')}}" class="col-inline">Ajuda</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <section id="meus-padido" class="secao col-inline col-9">
                <div class="header-title">
                    <h4 class="titulo">Meus Pedidos</h4>
                </div>
                <div class="engloba-pedido">
                    @foreach ($orders as $order)
                        <div class="box-pedido">
                            <div class="content">
                                <a href="javascript::void(0)" class="link-full btn_accordion_click"></a>
                                @switch($order->status)
                                    @case(0)
                                        <div class="js-animate" style="background: #F58533;">
                                    @break
                                    @case(1)
                                        <div class="js-animate" style="background: #FF4986;">
                                    @break
                                    @case(2)
                                        <div class="js-animate" style="background: #00BEC4;">
                                    @break
                                    @case(3)
                                        <div class="js-animate" style="background: #00bbab;">
                                    @break
                                    @case(4)
                                        <div class="js-animate" style="background: #5c5c5c;">
                                    @break
                                    @case(5)
                                        <div class="js-animate" style="background: #00BEC4;">
                                    @break
                                    @case(6)
                                        <div class="js-animate" style="background: #FF4986;">
                                    @break
                                @endswitch
                                    <i class="date col-inline">{{date('d/m/Y', strtotime($order->created_at))}}</i>
                                    @switch($order->status)
                                        @case(0)
                                            <p class="situacao col-inline">Em Aberto</p>
                                        @break
                                        @case(1)
                                            <p class="situacao col-inline">Preparando</p>
                                        @break
                                        @case(2)
                                            <p class="situacao col-inline">Enviado</p>
                                        @break
                                        @case(3)
                                            <p class="situacao col-inline">Entregue</p>
                                        @break
                                        @case(4)
                                            <p class="situacao col-inline">Devolvido</p>
                                        @break
                                        @case(5)
                                            <p class="situacao col-inline">Recebido</p>
                                        @break
                                        @case(6)
                                            <p class="situacao col-inline">Não Altorizado</p>
                                        @break
                                    @endswitch
                                    <i class="icon-text">&#xe877;</i>
                                </div>
                                <div class="oculto aba_accordion">
                                    @foreach ($order->orderItems as $orderItem)
                                        <div class="acodion">
                                            @php
                                                $productGallery = App\Product::with('gallery')->where('id', $orderItem->product_id)->first();
                                            @endphp
                                            @if ($productGallery)    
                                                @foreach ($productGallery->gallery as $productImage)
                                                    @if ($productImage->product_cover == 1)
                                                        <div class="image col-inline" style="background-image: url({{asset('storage/admin/uploads/fotos')}}/{{$productImage->path_image}});"></div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div class="image col-inline" style="background-image: url({{asset('site/assets/images/productDeleted.jpg')}});"></div>
                                            @endif
                                            <div class="descricao col-inline"> 
                                                <h4 class="titulo">{{$productGallery ? $productGallery->title : 'Anúncio encerrado'}}</h4>
                                                @if ($orderItem->size)
                                                    <p class="col-inline">{{$orderItem->size}}</p>
                                                @endif
                                                @if ($orderItem->color)
                                                    <p class="col-inline" style="background-color: {{$orderItem->color}}">Cor</p>
                                                @endif
                                                @if ($orderItem->slogan)
                                                    <p class="col-inline">Frase: {{$orderItem->slogan}}</p>
                                                @endif
                                                @if ($orderItem->image)
                                                    <p class="col-inline radius-full"  style="width: 40px;height: 40px;background-size: cover;background-image: url({{asset('storage/admin/attachment/order')}}/{{$orderItem->image}});"></p>
                                                @endif
                                                <p>Quantidade: {{$orderItem->quantity}} </p>
                                            </div>
                                            <div class="price col-inline">
                                                <i>R$ {{number_format($orderItem->amount,2,',','.')}}</i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="total dir">
                                    @if ($order->autorization == 1 && $order->link_billet)
                                        <i id="linkBoleto" class="desconto col-inline"><a href="{{$order->link_billet}}" target="_blank" rel="noopener noreferrer">2ª via Boleto</a></i>
                                    @endif
                                    @if ($order->restriction_code)
                                        <i id="rastreioOrder" class="desconto col-inline">Código rastreo: {{$order->restriction_code}}</i>
                                    @endif
                                    <i id="freteOrder" class="desconto col-inline">Frete: R$ {{number_format($order->freight,2,',','.')}}</i>
                                    <i class="desconto col-inline">Total: R$ {{number_format($order->amount,2,',','.')}}</i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
@endsection
