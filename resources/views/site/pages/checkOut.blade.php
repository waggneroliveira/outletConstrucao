@extends('site.layouts.app')
@section('content')
<script>
    $(function(){
        var sessionDelivery = "{{Session::has('cart_options.delivery.id') ? true : false}}";
        if(sessionDelivery == 1){
            $(window).on('load', function(){
                $('body, html').animate({
                    scrollTop: $('#confirmacao_final_pedido').offset().top - 50
                })
            });
        }

        $('#cardholder_name').on('keyup', function(){
            var valueUppercase = $(this).val().toUpperCase()
            $(this).val(valueUppercase)
        })
    });
</script>
    <section id="find-compra" class="secao">
        <div class="wrap" style="
            max-width: 100%;
            padding-top: 50px;
            padding-bottom: 15px;
        ">
            <div class="header-title secao">
                <h4 class="titulo esq">Finalizar Compra</h4>
            </div>
            <div id="location-entrega">
                <div class="descripition">
                    <div class="esq">
                        <div class="image esq" style="margin-top: 9px;">
                            <img src="{{asset('site/assets/images/location.png')}}" alt="">
                        </div>
                        <div class="box inforCalculoFrete">
                            <h4 class="titulo">Endereço de Entrega</h4>

                            @if (count($addresses) > 0)
                            <p>Selecione abaixo o endereço de entrega para calcular o frete:</p>
                            @else
                            <a href="#addAdress" data-fancybox=""><p>Adicione um endereço para calcular o frete</p></a>
                            @endif
                        </div>
                    </div>
                    <div class="dir">
                        <a href="#addAdress" data-fancybox="cadastrar-endereco" class="dir addAddressCheckout">
                            Adicionar Novo Endereço
                            <span>+</span>
                        </a>
                    </div>
                </div>
                <div class="engloba-box-location">
                    @foreach ($addresses as $address)
                    @php
                    $activeAddress = '';
                        if(Session::has('cart_options.delivery')){
                            if($address->id == Session::get('cart_options.delivery.id')){
                                $activeAddress = 'active';
                            }
                        }else{
                            if($address->default==1){
                                $activeAddress = 'active';
                            }
                        }
                    @endphp
                    <div class="box-locarion col-inline col-x4 trans-slow {{$activeAddress}}">
                        <div class="content">
                            <a href="{{route('site.checkout.address', ['address' => $address->id])}}" onclick="event.preventDefault(); setDelivery(this)" class="link-full"></a>
                            <div class="descricao">
                                <p>
                                    {{$address->public_place}}
                                    {{$address->number}},
                                    {{$address->region}},
                                    {{$address->city}}-{{$address->state}}
                                    CEP: {{$address->zip_code}}
                                    {{$address->complement}}
                                    ({{$address->reference}})
                                </p>
                            </div>
                            <div class="selected">
                                {{-- <i class="icon-text"><a href="{{route('site.address.edit', ['address' => $address->id])}}">&#xea04;</a></i> --}}
                                <i class="icon-text">&#xe828;</i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <section id="addAdress" style="display:none;">
                        <div class="wrap" id="add_adress">
                            <form action="{{route('site.address.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="customer_id" value="{{auth('customer')->user()->id}}">
                                <div class="label-input col-inline col-x2">
                                    <i class="row">CEP <i style="color: red;">*</i></i>
                                    <label for="zip_code">
                                        <input type="text" required data-mask="0000000000" onchange="getCepContent(this, '#state', '#city', '#region', '#public_place')" name="zip_code" id="zip_code">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Logradouro <i style="color: red;">*</i></i>
                                    <label for="public_place">
                                        <input type="text" required name="public_place" id="public_place">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Número <i style="color: red;">*</i></i>
                                    <label for="number">
                                        <input type="text" required name="number" id="number">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Estado <i style="color: red;">*</i></i>
                                    <label for="state">
                                        <select name="state" required id="state">
                                            <option value="0" disabeld selected >--</option>
                                            <option value="AC">AC</option>
                                            <option value="AL">AL</option>
                                            <option value="AP">AP</option>
                                            <option value="AM">AM</option>
                                            <option value="BA">BA</option>
                                            <option value="CE">CE</option>
                                            <option value="DF">DF</option>
                                            <option value="ES">ES</option>
                                            <option value="GO">GO</option>
                                            <option value="MA">MA</option>
                                            <option value="MT">MT</option>
                                            <option value="MS">MS</option>
                                            <option value="MG">MG</option>
                                            <option value="PA">PA</option>
                                            <option value="PB">PB</option>
                                            <option value="PR">PR</option>
                                            <option value="PE">PE</option>
                                            <option value="PI">PI</option>
                                            <option value="RJ">RJ</option>
                                            <option value="RN">RN</option>
                                            <option value="RS">RS</option>
                                            <option value="RO">RO</option>
                                            <option value="RR">RR</option>
                                            <option value="SC">SC</option>
                                            <option value="SP">SP</option>
                                            <option value="SE">SE</option>
                                            <option value="TO">TO</option>
                                        </select>
                                        {{-- <input type="text" required data-mask="AA" name="state" id="state"> --}}
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Cidade <i style="color: red;">*</i></i>
                                    <label for="city">
                                        <input type="text" required name="city" id="city">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Bairro <i style="color: red;">*</i></i>
                                    <label for="region">
                                        <input type="text" required name="region" id="region">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Complemento</i>
                                    <label for="complement">
                                        <input type="text" name="complement" id="complement">
                                    </label>
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <i class="row">Ponto de Referência <i style="color: red;">*</i></i>
                                    <label for="reference">
                                        <input type="text" required name="reference" id="reference">
                                    </label>
                                </div>
                                <div class="label-input label-input-checkbox col-inline col-x2">
                                    <input type="checkbox" name="default" id="default" value="1">
                                    <label for="default">
                                        Ativar como principal
                                    </label>
                                </div>

                                <input type="button" value="Confirmar" class="btnSubmit trans-slow">
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section id="detalhe-final-prod" class="col-inline col-8">
        <div class="wrap">
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
                        <!-- @if ($product->options->color)
                            <i class="acompanhamento col-inline" style="background-color: {{$product->options->color}}">{{$product->options->nameColor}}</i>
                        @endif
                        @if ($product->options->slogan)
                            <i class="acompanhamento col-inline">Frase: {{$product->options->slogan}}</i>
                        @endif
                        @if ($product->options->pathImage)
                            <i class="acompanhamento col-inline radius-full"  style="width: 40px;height: 40px;background-size: cover;background-image: url({{asset('storage/admin/uploads/fotos')}}/{{$product->options->pathImage}});"></i>
                        @endif -->
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
    </section>
    <section id="confirmacao_final_pedido" class="concluir col-inline col-4">
        <div class="wrap">
            <div class="enfloba-r">
                <ul class="valor-final">
                    <li>
                        <form id="recebeFrete" class="opcoes-frete" action="{{route('cart.freight')}}" method="post">
                            @if (isset($frefreights))
                                {!! $frefreights !!}
                            @endif
                        </form>
                    </li>
                    <li class="">Subtotal
                        <i class="col-inline" id="subtotal">R$ {{number_format(str_replace(',','',Cart::priceTotal()),2,',','.')}}</i>
                    </li>
                    <li class="recebeFrete">Frete:
                        <i id="fretePreco" style="color:#07980f;font-weight: bold;" class="col-inline">
                            @if (Session::has('cart_options.freight'))
                                @switch(Session::get('cart_options.freight.type'))
                                    @case('inStore')
                                        Retirar na loja GRÁTIS (1 dia)
                                    @break
                                    @case('gratis')
                                        Grátis ({{Session::get('cart_options.freight.deadline')}} dias)
                                    @break
                                    @default
                                    {{Session::get('cart_options.freight.type')}} - R$ {{number_format(Session::get('cart_options.freight.amount'),2,',','.')}} ({{Session::get('cart_options.freight.deadline')}} dias)
                                @endswitch
                            @else
                                -
                            @endif
                        </i>
                    </li>
                    <li class="">Desconto:
                        <i class=""  id="desconto">R$ {{number_format(str_replace(',','',Cart::discount()),2,',','.')}}</i>
                        <a class="col-inline float-right" href="{{route('cart.remove.discount')}}">X</a></i>
                    </li>
                    <li class="">Valor Total:
                        @if (Cart::total() >= $integration->min_price_freight_free && $integration->min_price_freight_free <> '')
                            <i class="" id="total">R$ {{number_format(str_replace(',','',Cart::total()),2,',','.')}}</i>
                            <input id="totalAmount" type="hidden" value="{{Cart::total()}}" />
                        @else
                            @if (Session::has('cart_options.freight.amount'))
                                <i class="" id="total">R$ {{number_format(str_replace(',','',Cart::total())+str_replace(',','.',Session::get('cart_options.freight.amount')),2,',','.')}}</i>
                                <input id="totalAmount" type="hidden" value="{{str_replace(',','',Cart::total())+Session::get('cart_options.freight.amount')}}" />
                            @else
                                <i class="" id="total">R$ {{number_format(str_replace(',','',Cart::total()),2,',','.')}}</i>
                                <input id="totalAmount" type="hidden" value="{{str_replace(',','',Cart::total())}}" />
                            @endif
                        @endif
                    </li>
                </ul>
                <form action="{{route('cart.discount')}}" method="post" id="cupom">
                    @csrf
                    <label for="cupom">
                        <input type="text" name="cupom" id="cupom" placeholder="Cupom de Desconto" {{Session::has('cart_options.coupon')?'disabled':''}} value="{{Session::has('cart_options.coupon')?'Cupom utilizado: '.Session::get('cart_options.coupon'):''}}">
                        @if (!Session::has('cart_options.coupon'))
                            <button type="submit" id="calcular_desconto" class="icon-text botao-link">&#xec08;</button>
                        @endif
                    </label>
                </form>
                <div class="paymentMethod">
                    <form action="{{route('site.checkout.payment')}}" method="post">
                        <ul>
                            <li>
                                <h5 class="titulo">Selecione o tipo de pagamento</h5>
                                <p><b>Obs.:</b> A instituição de pagamento acrescentará o valor de <b>R$ 1,00</b> na opção de <b>Boleto bancário</b></p>
                                <div class="eng-method col-inline col-6">
                                    <input type="radio" name="payment_method" class="selectPayment" id="PaymentBillet" value="billet">
                                    <label for="PaymentBillet" class="botao-link">
                                        <i class="icon-text">&#xedb8;</i>
                                        <span>Boleto Bancário</span>
                                    </label>
                                </div>
                                <div class="eng-method col-inline col-6">
                                    <input type="radio" name="payment_method" class="selectPayment" id="PaymentCard" value="cardCredit">
                                    <label for="PaymentCard" class="botao-link">
                                        <i class="icon-text">&#xe8bc;</i>
                                        <span>Cartão de Crédito</span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <input type="hidden" name="paymentInstitution" value="pagseguro">
                                <input type="hidden" id="maxParcel" name="maxParcel" value="5">
                                <div id="CardData" style="display:none;">
                                    <div class="cardsFlags">
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" id="VISA" name="flag_card" value="VISA">
                                            <label for="VISA">
                                                <img src="{{asset('site/assets/images/flags/visa.png')}}" width="100%" alt="VISA">
                                            </label>
                                        </div>
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" id="MASTERCARD" name="flag_card" value="MASTERCARD">
                                            <label for="MASTERCARD">
                                                <img src="{{asset('site/assets/images/flags/master.png')}}" width="100%" alt="MASTERCARD">
                                            </label>
                                        </div>
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" id="AMEX" name="flag_card" value="AMEX">
                                            <label for="AMEX">
                                                <img src="{{asset('site/assets/images/flags/amex.png')}}" width="100%" alt="AMEX">
                                            </label>
                                        </div>
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" id="ELO" name="flag_card" value="ELO">
                                            <label for="ELO">
                                                <img src="{{asset('site/assets/images/flags/elo.png')}}" width="100%" alt="ELO">
                                            </label>
                                        </div>
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" name="flag_card" id="DINERS" value="DINERS">
                                            <label for="DINERS">
                                                <img src="{{asset('site/assets/images/flags/diners.jpg')}}" width="100%" alt="DINERS">
                                            </label>
                                        </div>
                                        <div class="col-inline col-2 flags">
                                            <input type="radio" name="flag_card" id="HIPERCARD" value="HIPERCARD">
                                            <label for="HIPERCARD">
                                                <img src="{{asset('site/assets/images/flags/hipercard.png')}}" width="100%" alt="HIPERCARD">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="card_number">Número do Cartão <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control" name="card_number" id="card_number" data-mask="0000000000000000">
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="expiration_date">Validade <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control validateExpireCart" name="expiration_date" id="expiration_date" placeholder="00/0000" data-mask="00/0000">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="ccv">CCV <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control validateCCV" name="ccv" id="ccv" placeholder="000" data-mask="000">
                                    </div>
                                    <div class="form-group">
                                        <label for="cardholder_name">Nome do titular <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control validateNameComplete" name="cardholder_name" id="cardholder_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="birth_date">Data de Nascimento <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control validateDataNascimento" data-mask="00/00/0000" name="birth_date" id="birth_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpf">CPF <i style="color: red;">*</i></label>
                                        <input type="text" required class="form-control" name="cpf" id="cpf" data-mask="00000000000">
                                    </div>
                                    <div class="form-group">
                                        <label for="parcel">Parcelas <i style="color: red;">*</i></label>
                                        <select name="parcel" required id="parcel">
                                            <option selected value="0">Selecione a bandeira do cartão</option>
                                        </select>
                                        <input type="hidden" name="installmentValue" value="">
                                    </div>
                                </div>
                                {{-- <button id="finalizarCompra" onclick="ajaxFinishPayment(this)" type="button" class="finalizar-pedido trans-slow" >Finalizar Compra</button> --}}
                                {{-- <button id="finalizarCompra" type="button" class="finalizar-pedido trans-slow" >Finalizar Compra</button> --}}
                                <a href="javascript:void(0)" class="finalizar-pedido trans-slow" style="text-align: center;" onclick="ajaxFinishPayment(this)">Finalizar Compra</a>
                            </li>
                        </ul>
                    </form>
                </div>

                {{-- <a href="finalizar-pedido.blade.php" class="finalizar-pedido trans-slow">Finalizar Compra</a> --}}
            </div>
        </div>
    </section>
@endsection
