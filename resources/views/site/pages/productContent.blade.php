@extends('site.layouts.app')
@section('content')
    <section id="product-inter" class="secao product-inter-1">
        <div class="wrap">
            <h4 class="titulo-topo-produto col-inline">{{$product->title}}</h4>
            <div class="engloba-produto col-inline col-4">
                <div class="product-image">
                    @foreach ($galleries as $gallery)
                        @if ($gallery->product_cover == 1)
                            <div id="imageZoom" class="image zoom">
                                <a href="{{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}}" class="link-full" data-fancybox></a>
                                <img src="{{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}}" id="imageProductActual" width="100%" alt="{{$product->title}}">
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="galeria-product owl-carousel carrossel-galeria-product">
                    @foreach ($galleries as $gallery)
                        <div class="box-galeria-prod col-inline col-12 trans-slow">
                            <div class="content" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}})">
                                <a href="{{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}}" class="link-full btnGaleryProduct"></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    PagSeguroDirectPayment.getInstallments({
                        amount: $('[data-amount]').attr('data-amount'),
                        maxInstallmentNoInterest: 4,
                        brand: 'visa',
                        success: function(response){
                            // console.log(response)
                            // console.log(response.installments.visa[3].quantity)
                            var quantity = response.installments.visa[3].quantity
                            var installmentAmount = response.installments.visa[3].installmentAmount
                            var amount = installmentAmount.toLocaleString('pt-br', {minimumFractionDigits: 2})

                            $('#recebeParcelas').append(`<i>ou ${quantity}X de R$ ${amount} sem juros</i>`);
                        },
                        error: function(response) {
                            console.log(response);
                        },
                        complete: function(response){

                        }
                    });
                });
            </script>
            <div class="descricao-produto-final col-inline col-8">
                <form action="{{route('cart.add',['product'=>$product->slug])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="descripition" style="display: block;width:100%;">
                        <div class="descricao" style="display: block;width:100%;">
                            <div class="esq col-8">
                                <div id="recebeParcelas" class="row"></div>
                                <div class="price" id="getAmounts">
                                    <div id="appendAmount">
                                        @foreach ($product->stocksDefault as $stock)
                                            @if ($stock->promotion_value)
                                                <div class="value col-inline">
                                                    <i id="promotionValue" data-amount="{{$stock->promotion_value}}">R$ {{number_format($stock->promotion_value,2,',','.')}}</i>
                                                </div>
                                                <div class="value-passado col-inline">
                                                    <i id="amount">R$ {{number_format($stock->amount,2,',','.')}}</i>
                                                </div>
                                            @else
                                                <div class="value col-inline">
                                                    <i id="amount" data-amount="{{$stock->amount}}">R$ {{number_format($stock->amount,2,',','.')}}</i>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <h4 class="titulo col-inline">{{$product->title}}</h4>

                            </div>

                            <div class="box-botao-caar dir">
                                {{-- @if (count($product->stocksDefault))
                                    <button type="button" id="btnAddCart" class="col-inline trans-slow enviar">Adicionar ao Carrinho</button>
                                @endif
                                <div class="wishButton">
                                    @if ($favorite)
                                        <a href="{{Route('site.removeFavorite', ['favorites' => $favorite->id])}}"><span class="icon-text">&#xe819;</span> <i>Remover dos favoritos</i></a>
                                    @else
                                        <a href="javascript::" onclick="addFavorite(this,'{{Route('site.addFavorite')}}',{{$product->id}})"><span class="icon-text">&#xe819;</span> <i>Adicionar aos favoritos</i></a>
                                    @endif
                                </div> --}}
                            </div>

                            <div class="clearFix"></div>
                            <p class="brief_description">{{ $product->brief_description }}</p>
                        </div>
                        @foreach ($product->stocksDefault as $stock)
                            <div class="gerenciador-quantidade-produto col-inline">
                                <h3 class="quantidade col-inline">Quantidade:</h3>
                                <a href="javascript:void(0)" data-stock="{{$stock->id}}" onclick="alteraQuantidade(this, 'decrementa', 'quantidade-total','{{route('site.verifyStock')}}', 'product')" class="btnQuantidade decrementa-quantidade col-inline">-</a>
                                <div class="col-inline quantidade-adicionada" action="" method="post">
                                    <label for="quantidade-total">
                                        <input type="text" name="quantity_input" min="1" data-stock="{{$stock->id}}" onchange="alteraQuantidade(this, 'change', 'quantidade-total', '{{route('site.verifyStock')}}', 'product')" id="quantidade-total" placeholder="0" value="1">
                                    </label>
                                </div>
                                <a href="javascript:void(0)" data-stock="{{$stock->id}}"  onclick="alteraQuantidade(this, 'incrementa', 'quantidade-total', '{{route('site.verifyStock')}}', 'product')" class="btnQuantidade acrescenta-quantidade col-inline">+</a>
                            </div>
                        @endforeach

                        @if (count($product->stocksDefault))
                        <div class="opcoes-produto-estoque" id="refreshAmount">
                            <div id="productSizes" class="box-opcoes-produto-estoque col-inline col-6 size">
                                <div class="content">
                                    @foreach ($product->stocksDefault as $stock)
                                        @if ($stock->sizeChart==1)
                                            <h3 class="titulo">Escolha uma opção
                                                <a href="{{asset('storage/admin/uploads/fotos')}}/{{$sizeChart->path_image}}" data-fancybox="" class="radius-full col-inline">?</a>
                                            </h3>
                                        @else
                                            <h3 class="titulo">Escolha uma opção</h3>
                                        @endif
                                    @endforeach
                                    <ul>
                                        @foreach ($productSizes as $productSize)
                                            @foreach ($product->stocksDefault as $stock)
                                                <li class="col-inline">
                                                    <input {{$stock->id==$productSize->id?'checked':''}} class="refStockId"  type="radio" name="product_size" id="productSize-{{$productSize->id}}" data-stock="{{$productSize->id}}" value="{{$productSize->id}}">
                                                    <label for="productSize-{{$productSize->id}}"
                                                        onclick="getColorStock('{{route('site.stockColor', ['product' => $product->slug, 'productSize' => $productSize->productSize_id])}}', '#productColors'); refreshAmountProduct(this)" data-route="{{route('site.stock.refreshAmountProduct', ['stock' => $productSize->id])}}" class="radius-full trans-slow">
                                                        {{$productSize->title}}
                                                    </label>
                                                </li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div id="productColors" class="box-opcoes-produto-estoque col-inline col-6 colors">
                                <div class="content">
                                    <h3 class="titulo" style="{{$product->stocksDefault[0]->productColor_id==0?'display:none;':''}}">Escolha uma Cor/Estampa</h3>
                                    <ul>
                                        @foreach ($productColors as $productColor)
                                            @foreach ($product->stocksDefault as $stock)
                                                @if ($productColor->id <> 0)
                                                    @if ($productColor->path_image)
                                                        <li class="col-inline">
                                                            <input type="radio" {{$stock->id==$productColor->stockId?'checked':''}} class="refStockId" onclick="refreshAmountProduct(this)" data-route="{{route('site.stock.refreshAmountProduct', ['stock' => $productColor->stockId])}}" name="product_color" id="productColor-{{$productColor->stockId}}" data-stock="{{$stock->stockId}}" value="{{$productColor->id}}">
                                                            <label for="productColor-{{$productColor->stockId}}" href="javascript:void(0)" title="{{$productColor->name}}" style="background: url({{asset('storage/admin/uploads/fotos')}}/{{$productColor->path_image}}) center no-repeat;background-size: cover;" onclick="" class="radius-full trans-slow">
                                                                <span class="hoverEstampa trans-slow"><img src="{{asset('storage/admin/uploads/fotos/')}}/{{$productColor->path_image}}" alt="{{$productColor->name}}"></span>
                                                            </label>
                                                        </li>
                                                    @else
                                                        <li class="col-inline">
                                                            <input type="radio" {{$stock->id==$productColor->stockId?'checked':''}} class="refStockId" onclick="refreshAmountProduct(this)" data-route="{{route('site.stock.refreshAmountProduct', ['stock' => $productColor->stockId])}}" name="product_color" id="productColor-{{$productColor->stockId}}" data-stock="{{$stock->stockId}}" value="{{$productColor->id}}">
                                                            <label for="productColor-{{$productColor->stockId}}" href="javascript:void(0)" title="{{$productColor->name}}" style="background-color: {{$productColor->color}};" onclick="" class="radius-full trans-slow"></label>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="btnAddProductMobile box-botao-caar dir">
                            {{-- @if (count($product->stocksDefault))
                                <button type="button" id="btnAddCart" class="col-inline trans-slow enviar">Adicionar ao Carrinho</button>
                            @endif --}}
                        </div>
                        <script>
                            $(document).ready(function(){
                                $('[data-info-prod]').on('click', function(){
                                    var alvo = $(this).attr('data-info-prod');
                                    if(alvo == '#description-Product'){
                                        $('#feature-Product').fadeOut('slow', function(){
                                            $(alvo).fadeIn('slow');
                                        })
                                    }
                                    if(alvo == '#feature-Product'){
                                        $('#description-Product').fadeOut('slow', function(){
                                            $(alvo).fadeIn('slow');
                                        })
                                    }
                                })
                            })
                        </script>
                        <div id="descricao-completa">
                            <ul class="titulo">
                                @if ($product->description <> '')
                                    <li class="col-inline col-3"><a href="javascript:void(0)" data-info-prod="#description-Product"><h4>Descrição</h4></a></li>
                                @endif
                                @if ($product->feature <> '')
                                    <!-- <li class="col-inline col-3"><a href="javascript:void(0)" data-info-prod="#feature-Product"><h4>Características</h4></a></li> -->
                                @endif
                            </ul>
                            <div id="description-Product" class="InfoProduct">
                                {!! $product->description !!}
                                <span class="referenceCode">Código: {{$product->reference_code}}</span>
                            </div>
                            <div id="feature-Product" class="InfoProduct">
                                {!! $product->feature !!}
                            </div>

                        </div>
                        
                        <div class="btn-interesse">
                            <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank">Tenho interesse</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section id="aproveita" class="secao">
        <div class="wrap">
            <div class="header">
                <h4 class="titulo">Produtos Relacionados</h4>

                <div class="border col-9"></div>
            </div>
            <div class="engloba-box-aproveita">
                <div class="carousel-combo owl-carousel">
                    @foreach ($products as $product)
                        <div class="box-grid col-inline trans-slow">
                            <div class="content">
                                {{-- <div class="curtida">
                                    <i class="like"><img src="{{asset('site/assets/images/like.svg')}}"></i>
                                </div> --}}

                                <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>

                                @foreach ($product->gallery as $gallery)
                                    @if ($gallery->product_cover == 1)
                                        <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                    @endif
                                @endforeach
                                <div class="descricao">
                                    <h4 class="titulo">{{ $product->title }}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="" class="view_products trans-slow dir">Todos os Produtos</a>
            </div>
        </div>
    </section>
@endsection
