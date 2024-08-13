@extends('site.layouts.app')
@section('content')
    <section id="banner" class="secao-full sec-banner">
        <ul class="dimensoes-slide carousel-banner owl-carousel">
            <!-- inicio lamina slide -->
            @foreach ($slides as $slide)
            <li data-image-mobile="@if($slide->path_image_mobile <> ''){{asset('storage/admin/uploads/fotos')}}/{{ $slide->path_image_mobile }}@endif" style="background-image: url({{asset('storage/admin/uploads/fotos')}}/{{ $slide->path_image }});position:relative;">
                <div class="desc-bann">
                    <div class="container">
                        <div class="central">
                            @if ($slide->title <> '')
                                <h1 class="titulo">{{ $slide->title }}</h1>
                            @endif
                            @if ($slide->subtitle <> '')
                                <h3 class="subtitulo">{{ $slide->subtitle }}</h3>
                            @endif
                            @if ($slide->description <> '')
                                <p>{{ $slide->description }}</p>
                            @endif
                            @if ($slide->product_id <> 0)
                                <a href="{{route('site.product.productContent', ['product' => $slide->productSlug])}}" style="background: #f2df16;" class="btn-compra trans-slow">Saiba mais</a>
                            @elseif ($slide->whatsapp_button != '')
                                <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank" class="btn-compra trans-slow"><span class="icon-text">&#xf232;</span>{{ $slide->whatsapp_button }}</a>
                            @endif
                        </div>
                        <!-- fim .central -->
                    </div>
                    <!-- fim .container -->
                </div>
                <!-- fim .desc-bann -->
            </li>
            @endforeach
            <!-- fim lamina slide -->
        </ul>
        <i class="firula01"></i>
        <i class="firula02"></i>
        <i class="firula03"></i>
        <i class="firula04"></i>
    </section>
    <!-- fim #sec-banner -->
    <section id="miolo" class="secao">
        <section id="indece" class="indice secao">

            <div class="engloba-indice">
                <div class="carrossel">
                    @foreach ($topics as $topic)
                        <div class="box-indice col-inline col-x4">
                            <div class="content">
                                <!-- <a href="" class="link-full"></a> -->

                                <div class="container">
                                    <div class="central">
                                        <div class="image esq">
                                            <img src="{{asset('storage/admin/uploads/fotos')}}/{{ $topic->path_image }}" alt="{{ $topic->title }}">
                                        </div>

                                        <div class="descricao">
                                            <h4 class="titulo">{{ $topic->title }}</h4>
                                            <p>{{ $topic->subtitle }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="storie" class="stori secao normal trans-slow ">
            <div class="wrap">
                <div class="engloa-storie carousel-storie owl-carousel ">
                    @foreach ($categories as $category)
                    <div class="box-storie col-inline trans-slow">
                        <div class="content" style="border:solid 10px {{$category->color}};">
                            <a href="{{route('site.product.category', ['category' => $category->slug])}}" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('storage/admin/uploads/fotos')}}/{{$category->path_image}}" alt="">
                            </div>
                        </div>
                        <div class="descricao">
                            <h4 class="titulo">{{$category->title}}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </section>
        <section id="novidade" class="secao">
            <div class="wrap">
                <div class="engloba-box-novidade">
                    <div class="carousel-novidade owl-carousel">
                        @foreach ($posts as $post)
                            <div class="box-novidade col-inline trans-slow ">
                                <div class="content">
                                    <a href="{{$post->link}}" {{$post->type_link==2?'target=_blank':''}} class="link-full"></a>
                                    <div class="image" style="background-image:  url({{asset('storage/admin/uploads/fotos')}}/{{$post->path_image}});"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- fim section id="storie" class="stori secao"> -->

        <section id="pedido">
            <div class="wrap">
                <h4 class="titulo">Faça seu pedido pelo whatsapp!</h4>

                <p>Os produtos ideais para a sua construção e/ou reforma você encontra aqui! Temos tudo o que você precisa, as melhores marcas com a qualidade que você merece.</p>

                <a href="https://api.whatsapp.com/send?phone=55{{$contacts->whatsapp}}&text=Ol%C3%A1%2C%20" target="_blank"> <span class="icon-text">&#xf232;</span> {{$contacts->whatsapp}}</a>
            </div>
        </section>

        <section id="anuncion" class="secao" style="display: none;">
            <div class="wrap">
                <div class="engloba-unicio">
                    @foreach ($posts as $post)
                    <div class="box-anuncio col-inline col-x3 trans-slow">
                        <div class="content">
                            @if ($post->link)
                                <a href="{{$post->link}}" {{$post->type_link==2?'target=_blank':''}} class="link-full"></a>
                            @endif
                            <div class="image">
                                <img src="{{asset('storage/admin/uploads/fotos')}}/{{$post->path_image}}" alt="">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="super_grid_carosel" class="secao-produtos-{{$category->id}} secao box-grid_carossel">
            <div class="wrap">
                <div id="grid_carossel_primary" class="grid_carossel col-inline">
                    <div class="image col-1">
                        <img src="{{asset('site/assets/images/destaque.png')}}">
                    </div>

                    <h2 class="titulo-principal col-3">Destaques</h2>

                    <div class="border col-9"></div>
                </div>

                <div class="carousel-combo owl-carousel">
                    @foreach ($category->productsDestaque as $product)
                    <div class="box-grid col-inline trans-slow">
                        <div class="content">
                            {{-- <div class="curtida col-inline">
                                <a href="javascript:void(0)" class="link-full" onclick="addFavorite(this, '{{route('site.addFavorite')}}', {{$product->id}})"></a>
                                <div class="like"><img src="{{asset('site/assets/images/like.svg')}}"></div>
                            </div> --}}

                            <span style="border:solid 1px {{$category->color}};"></span>

                            <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>
                            @foreach ($product->gallery as $gallery)
                                @if ($gallery->product_cover == 1)
                                    <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                @endif
                            @endforeach
                            <div class="descricao">
                                <h6 class="titulo">{{ $product->title }}</h6>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('site.product.category', ['category' => $category->slug]) }}" class="view_products trans-slow dir">Todos os Produtos</a>
            </div>
        </section>

        @foreach ($categoriesAndProducts as $category)
        <style>
            #super_grid_carosel.secao-produtos-{{$category->id}} .carousel-combo .owl-next, #super_grid_carosel.secao-produtos-{{$category->id}} .carousel-combo .owl-prev{
                background:{{$category->color}};
            }
            #super_grid_carosel.secao-produtos-{{$category->id}} .grid_carossel .view_products:hover{
                background:{{$category->color}};
            }

        </style>

        <section id="super_grid_carosel" class="secao-produtos-{{$category->id}} secao box-grid_carossel">
            <div class="wrap">
                <div id="grid_carossel_primary" class="grid_carossel col-inline">
                    <div class="image col-1">
                        <img src="{{asset('storage/admin/uploads/fotos')}}/{{$category->path_image}}">
                    </div>

                    <h2 class="titulo-principal col-3">{{ $category->title }}</h2>

                    <div class="border col-9"></div>
                </div>

                <div class="carousel-combo owl-carousel">
                    @foreach ($category->productsDestaque as $product)
                    <div class="box-grid col-inline trans-slow">
                        <div class="content">
                            {{-- <div class="curtida col-inline">
                                <a href="javascript:void(0)" class="link-full" onclick="addFavorite(this, '{{route('site.addFavorite')}}', {{$product->id}})"></a>
                                <div class="like"><img src="{{asset('site/assets/images/like.svg')}}"></div>
                            </div> --}}

                            <span style="border:solid 1px {{$category->color}};"></span>

                            <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>
                            @foreach ($product->gallery as $gallery)
                                @if ($gallery->product_cover == 1)
                                    <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                @endif
                            @endforeach
                            <div class="descricao">
                                <h6 class="titulo">{{ $product->title }}</h6>
                                <!-- <p> {{$product->brief_description}}</p> -->
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('site.product.category', ['category' => $category->slug]) }}" class="view_products trans-slow dir">Todos os Produtos</a>
            </div>
        </section>
        @endforeach

        @if ($productsPromotion->count())
        <section id="super_grid_carosel" class="secao box-grid_carossel promocao">
            <div class="wrap">


                <div id="grid_carossel_primary" class="grid_carossel col-inline col-3">
                    <div class="image col-1">
                        <img src="{{asset('site/assets/images/prom.png')}}" alt="Promoção">
                    </div>

                    <h2 class="titulo-principal col-3">Promoções</h2>

                    <div class="border col-9"></div>
                </div>
                <div class="carousel-combo owl-carousel">
                    @foreach ($productsPromotion as $productPromotion)
                    <div class="box-grid col-inline trans-slow">
                        <div class="content">
                            {{-- <div class="curtida col-inline">
                                <a href="javascript:void(0)" class="link-full" onclick="addFavorite(this, '{{route('site.addFavorite')}}', {{$product->id}})"></a>
                                <div class="like"><img src="{{asset('site/assets/images/like.svg')}}"></div>
                            </div> --}}

                            <span style="border:solid 1px {{$category->color}};"></span>

                            <a href="{{route('site.product.productContent', ['product' => $productPromotion->slug])}}" class="link-full"></a>
                            @foreach ($productPromotion->gallery as $gallery)
                                @if ($gallery->product_cover == 1)
                                    <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});"></div>
                                @endif
                            @endforeach
                            <div class="descricao">
                                <h6 class="titulo">{{ $productPromotion->title }}</h6>
                                <!-- <p> {{$productPromotion->brief_description}}</p> -->
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="{{route('site.product.promotion')}}" class="view_products trans-slow dir">Todos os Produtos</a>
            </div>
        </section>
        @endif
    </section>
    <!--  FIM #miolo> -->
@endsection
