@extends('site.layouts.app')
@section('content')
    <section id="meus_dados" class="secao">
        <div class="wrap">
            <div class="guia-pag dir">
                <a href="javascript::" class="col-inline">Categorias</a>
                <i class="col-inline">/</i>
                <a href="javascript::" class="col-inline">Cards Especiais</a>
            </div>
            <div id="menu-dado" class="col-inline col-3">
                <h4 class="titulo"><b>Olá,</b>{{explode(' ', auth('customer')->user()->name)[0]}}</h4>
                <nav>
                    <ul>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/user.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.profile.show')}}" class="col-inline"> Meus dados</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/marker.png')}}" alt="">
                            </div>
                            <a href="{{route('site.address.index')}}" class="col-inline click-ajax">Meus endereços</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/pedidoo.png')}}" alt="">
                            </div>
                            <a href="{{route('customer.login')}}" class="col-inline">Meus Pedidos</a>
                        </li>
                        <li class="trans-slow click-dado active">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/coracao.png')}}" alt="">
                            </div>
                            <a href="{{route('site.customer.favorites')}}" class="col-inline">Favoritos</a>
                        </li>
                        <li class="trans-slow click-dado">
                            <div class="image col-inline">
                                <img src="{{asset('site/assets/images/aju.png')}}" alt="">
                            </div>
                            <a href="{{route('site.help')}}" class="col-inline">Ajuda</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="favorito"class="favorito col-inline col-9">
                <h4 class="tituloo">Meus Favoritos</h4>

                <div id="products" class="produto" style="margin-top: 30px;padding: 20px 0;">
                    @foreach ($favorites as $product)
                        <div class="box-grid col-inline col-x3 trans-slow" style="padding: 10px;">
                            <div class="content" style="border:solid 2px #ff7e1c;">
                                <div class="wishButton col-inline">
                                    <form action="{{Route('site.removeFavorite', ['favorites' => $product->favorite_id])}}" method="HEAD">
                                        @csrf
                                        <button type="submit" class="icon-text">&#xe82a;</button>
                                    </form>
                                </div>
                                <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>
                                <div class="carousel-galeria-produto owl-carousel">
                                    @foreach ($product->gallery as $gallery)
                                        <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});">
                                            <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="descricao">
                                    <h4 class="titulo">{{ $product->title }}</h4>
                                    <p> {{$product->brief_description}}</p>
                                </div>
                                <div class="preco-box ">
                                    @if ($product->stocksDefault->count() <= 0)
                                        <span class="preco col-inline" style="color: #ff7e1c;">Esgotado</span>
                                    @endif
                                    @foreach ($product->stocksDefault as $stock)
                                        @if ($stock->promotion_value)
                                            <div class="eng-preco col-inline esq">
                                                <strike class="value-passado">de R$ {{number_format($stock->amount,2,',','.')}} </strike>
                                                <span class="preco col-inline"><i>por</i> R$ {{number_format($stock->promotion_value,2,',','.')}} </span>
                                            </div>
                                        @else
                                            <i class="preco col-inline">R$ {{number_format($stock->amount,2,',','.')}} </i>
                                        @endif
                                    @endforeach
                                    <div class="btn-comprra col-inline dir">
                                        <a href="javascript::" style="background:#ff7e1c;">
                                            <img src="{{asset('site/assets/images/comece.png')}}"> Comprar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- <div id="products" class="produto">
                    @foreach($favorites as $product)
                    <div class="box-produto col-inline col-x3 trans-slow">
                        <div class="wishButton col-inline">
                            <a href="javascript::" onclick="addFavorite(this,'{{Route('site.addFavorite')}}',{{$product->id}})" class="icon-text">&#xe819;</a>
                        </div>
                        <div class="content">
                            <a href="{{route('site.product.productContent', ['product' => $product->id])}}" class="link-full"></a>
                            @foreach ($product->gallery as $gallery)
                                @if ($gallery->product_cover == 1)
                                    <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                @endif
                            @endforeach
                            </div>
                            <div class="descricao">
                                <div class="descricao">
                                    <h6 class="titulo">{{ $product->title }}</h6>
                                    <p> {{$product->brief_description}}</p>
                                </div>

                                @foreach ($product->stocksDefault as $stock)
                                    @if ($stock->promotion_value)
                                        <i class="preco">R$ {{$stock->promotion_value}} </i>
                                    @else
                                        <i class="preco">R$ {{$stock->amount}} </i>
                                    @endif
                                @endforeach
                            </div>
                            <div class="btn-comprra">
                                <a href="javascript::" class="col-inline">
                                    <img src="{{asset('site/assets/images/comece.png')}}">
                                </a>
                                <p class="col-inline">Comprar</p>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
