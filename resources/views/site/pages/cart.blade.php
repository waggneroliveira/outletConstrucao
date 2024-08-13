@extends('site.layouts.app')
@section('content')
    <section id="sec-prod-carr">
        <div class="wrap">
            <div class="sec-prod-carr1 esq">
                <div id="detalhe-final-prod" >
                        <div id="carrinho" class="secao">
                            <div class="engloba-mine-navegation"id="retorno-ajax">
                                <a href="javascript::" title="Voltar"alt="Voltar"class="col-inline icon-text cont">Meu Carrinho</a>
                            </div>
                        </div>
                        <h5 class="col-inline col-4 lista-prod">Lista de produtos</h5>
                        <h5 class="col-inline quantidade">Quantidade</h5>
                        <h5 class="col-inline valor">Valor Unitário</h5>
                        <ul class="col-inline col-4 profuto">
                        @foreach(Cart::content() as $product)
                        <li>
                            <div class="flex">
                                <div class="produto">
                                    @php
                                        $productGallery = App\Product::with('gallery')->find($product->id);
                                    @endphp
                                    @foreach ($productGallery->gallery as $productImage)
                                        @if ($productImage->product_cover == 1)
                                            <div class="image esq" style="background-image: url({{asset('storage/admin/uploads/fotos')}}/{{$productImage->path_image}});"></div>
                                        @endif
                                    @endforeach
                                    <div class="descricao">
                                        <h3 class="titulo">{{$product->name}}</h3>
                                        <p>{!! substr(strip_tags($productGallery->description),0,50) !!}</p>
                                    </div>
                                </div>
                                <div class="gerenciador-quantidade-produto">
                                    <a href="javascript:void(0)" data-op="decrementa" data-stock="{{$product->options->stock_id}}" onclick="alteraQuantidade(this, 'decrementa', '{{$product->rowId}}','{{route('site.verifyStock')}}', 'cart')" data-id="{{$product->rowId}}" class="decrementa-quantidade col-inline btnQuantidadeCart">-</a>
                                    <!-- descrementa-quantidade col-inline">+</a> -->
                                    <div class="col-inline quantidade-adicionada" action="" method="post">
                                        <form id="quant_form{{$product->rowId}}" class="col-inline quantidade-adicionada" action="{{route('cart.quantity',['cart_item'=>$product->rowId])}}" method="post" style="width:100%;">
                                            @csrf
                                            @method('PUT')
                                            <label for="quantidade-total">
                                                <input type="text" name="quantity_input" data-stock="{{$product->options->stock_id}}" onchange="alteraQuantidade(this, 'change', '{{$product->rowId}}','{{route('site.verifyStock')}}', 'cart')" id="{{$product->rowId}}" value="{{$product->qty}}">
                                                <!-- contador de produtos adicionados -->
                                            </label>
                                        </form>
                                    </div>
                                    <a href="javascript:void(0)" data-op="incrementa" data-stock="{{$product->options->stock_id}}" onclick="alteraQuantidade(this, 'incrementa', '{{$product->rowId}}','{{route('site.verifyStock')}}', 'cart')" data-id="{{$product->rowId}}" class="acrescenta-quantidade col-inline btnQuantidadeCart">+</a>
                                    <!-- acrescenta-quantidade col-inline">+</a> -->
                                </div>
                                <div class="valor-unitario">
                                    <h3 class="col-inline">R$ {{number_format($product->price,2,',','.')}}</h3>
                                    <a href="{{route('cart.remove',['id'=>$product->rowId])}}" alt="Remover" class="col-inline excluir-produto dir">X</a>
                                </div>
                            </div>
                            <div class="row descricao" style="padding-left: 96px;margin-top: 8px;">
                                @if ($product->options->size)
                                    <i class="acompanhamento col-inline">{{$product->options->size}}</i>
                                @endif
                                @if ($product->options->color)
                                    <i class="acompanhamento col-inline" style="background-color: {{$product->options->color}}">{{$product->options->nameColor}}</i>
                                @endif
                                @if ($product->options->slogan)
                                    <i class="acompanhamento col-inline">Frase: {{$product->options->slogan}}</i>
                                @endif
                                @if ($product->options->pathImage)
                                    <i class="acompanhamento col-inline radius-full"  style="width: 40px;height: 40px;background-size: cover;background-image: url({{asset('storage/admin/uploads/fotos')}}/{{$product->options->pathImage}});"></i>
                                @endif
                                @if ($product->options->reference)
                                    <i class="acompanhamento col-inline">Referencia: {{$product->options->reference}}</i>
                                @endif
                                @if ($product->options->model)
                                    <i class="acompanhamento col-inline">Modelo: {{$product->options->model}}</i>
                                @endif
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="sec-prod-carr2 esq">
                <div id="confirmacao_final_pedido">
                    <div id="resumoCarrinho" class="enfloba-r">
                        <ul class="valor-final">
                            <li class="">Subtotal
                                <i class="col-inline" id="subtotal">R$ {{number_format(str_replace(',','',Cart::priceTotal()),2,',','.')}}</i>
                            </li>
                            <li class="recebeFrete">
                                Frete:
                                <i id="fretePreco" title="Continuar para calcular o frete" style="color:#07980f;font-weight: bold;" class="col-inline">-</i>
                            </li>
                            <li class="">Desconto:
                                <i class=""  id="desconto">R$ {{number_format(str_replace(',','',Cart::discount()),2,',','.')}}</i>
                                <a class="col-inline float-right" href="{{route('cart.remove.discount')}}">X</a></i>
                            </li>
                            <li class="">Valor Total:
                                @if (Session::has('cart_options.freight.amount'))
                                    <i class="" id="total">R$ {{number_format(str_replace(',','',Cart::total())+str_replace(',','.',Session::get('cart_options.freight.amount')),2,',','.')}}</i>
                                @else
                                    <i class="" id="total">R$ {{number_format(str_replace(',','',Cart::total()),2,',','.')}}</i>
                                @endif

                            </li>
                        </ul>
                        <form action="{{route('cart.discount')}}" method="post" id="cupom">
                            @csrf
                            <label for="cupom">
                                <input type="text" name="cupom" id="cupom"placeholder="Cupom de Desconto">
                                <button type="submit" id="calcular_desconto" class="icon-text botao-link">&#xec08;</button>
                            </label>
                        </form>
                        <a href="{{route('site.checkout')}}" class="finalizar-pedido trans-slow">Finalizar Compra</a>
                    </div>
                    <div id="frete">
                        <form id="opcoes-frete" onsubmit="event.preventDefault()" action="{{route('site.melhorenvio.calc')}}" method="post">
                            @csrf
                            <h3 class="titulo">Estimativa de entrega</h3>
                            <p>Informe o CEP para consultar</p>
                            <label for="cupom">
                                <input type="text" name="zip_code" data-mask="00000000" id="CEP" placeholder="Digite seu CEP">
                            </label>
                            <input type="button" id="btnCalculaFrete" value="Calcular">
                            <div id="inputOpcaoFrete" class="viewOpcoesFrete">
                                <div class="form-group">
                                    <label for="sedex">Retirar na loja GRÁTIS (1 dia)</label>
                                </div>
                                <div class="form-group">
                                    <label for="sedex">Frete Fixo R$ 15,00 (Motoboy)</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="aproveita" class="secao">
        <div class="wrap">
            <div class="header">
                <h4 class="titulo">Produtos Relacionados</h4>
            </div>
            <div class="engloba-box-aproveita">
                @foreach ($topProducts as $topProduct)
                    <div class="box-grid col-inline col-x4 trans-slow" style=" margin-bottom:14px;padding-right: 8px;">
                        <div class="content" style="padding: 28px 25px;">

                            <a href="{{route('site.product.productContent', ['product' => $topProduct->slug])}}" class="link-full"></a>
                            @foreach ($topProduct->gallery as $gallery)
                                @if ($gallery->product_cover == 1)
                                    <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                @endif
                            @endforeach
                            <div class="descricao">
                                <h4 class="titulo">{{ $topProduct->title }}</h4>
                                <p>{!! substr(strip_tags($topProduct->description),0,90) !!}</p>
                            </div>

                            <div class="preco-box">
                                @foreach ($topProduct->stocksDefault as $stock)
                                    @if ($stock->promotion_value)
                                        <i class="preco col-inline">R$ {{$stock->promotion_value}} </i>
                                    @else
                                        <i class="preco col-inline">R$ {{$stock->amount}} </i>
                                    @endif
                                @endforeach
                                <div class="btn-comprra col-inline">
                                    <a href="javascript::" style="background:#f58533;">
                                        <img src="{{asset('site/assets/images/comece.png')}}"> Comprar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
