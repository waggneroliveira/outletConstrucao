@extends('site.layouts.app')
@section('content')
    <style>
        @media screen and (max-width: 600px) {
            #topo .engloba-super-menu #mega-menu{
                display: none;
            }
        }
    </style>
    @php
        $arrPagina = explode('/', Request::path());
    @endphp
    <section id="produto" class="secao">
        <div class="wrap">
            <div class="container">
                <ul>
                  <li class="dropdown">
                    <input type="checkbox" />
                    <a href="#" data-toggle="dropdown">Categorias</a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                            <li class="subcategoria trans-slow">
                                <a href="{{route('site.product.category', ['category' => $category->slug])}}"class="@if (isset($categoryCurrent)) {{$categoryCurrent->id == $category->id?'active':''}} @endif @if (isset($subcategoryCurrent)) {{$subcategoryCurrent->category_id == $category->id?'active':''}} @endif" > {{$category->title}} </a>
                                @if (COUNT($category->subcategory))
                                    <div class="engloba-sub-menu trans-slow" @if(isset($categoryCurrent)) {{$categoryCurrent->id == $category->id?'style=display:block':''}}@endif @if(isset($subcategoryCurrent)) {{$subcategoryCurrent->category_id == $category->id?'style=display:block':''}}@endif>
                                        <ul>
                                            @foreach ($category->subcategory as $subcategory)
                                            <li><a href="{{route('site.product.subcategory', ['subcategory' => $subcategory->slug])}}" class=""> {{$subcategory->title}} </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                  </li>
                  <li class="dropdown">
                    <input type="checkbox" />
                    <a href="#" data-toggle="dropdown">Cores e estampas</a>
                    <ul class="dropdown-menu">
                        @foreach ($colors as $color)
                        <li class="subcategoria trans-slow">
                            @switch($field)
                                @case('products')
                                    <a href="{{route('site.product.productColors', ['productColor' => $color->productColorId])}}"class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                @break
                                @case('category')
                                    <a href="{{route('site.product.productColorCategory', ['category' => $color->category_slug, 'productColor' => $color->productColorId])}}" class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                @break
                                @case('subcategory')
                                    <a href="{{route('site.product.productColorSubcategory', ['category' => $color->category_slug, 'subcategory' => $color->subcategory_slug, 'productColor' => $color->productColorId])}}"class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                @break
                            @endswitch
                        </li>
                        @endforeach
                    </ul>
                  </li>
                  {{-- <li class="dropdown">
                    <input type="checkbox" />
                    <a href="#" data-toggle="dropdown">Filtro por Preço:</a>
                    <ul class="dropdown-menu">
                        <form action="{{route('site.product.priceFilter')}}" method="post">
                            @csrf
                            <label for="value-inicial" class="col-inline">
                                <i class="col-inline">de</i>
                                <input type="text" data-mask="000.000.00" data-mask-reverse="true" name="priceStart" id="value-inicial" value="{{isset($request->priceStart)?$request->priceStart:''}}">
                            </label>
                            <i class="col-inline r">até</i>
                            <label for="value-inicial" class="col-inline">
                                <input type="text" data-mask="000.000.00" data-mask-reverse="true" name="priceEnd" id="value-inicial" value="{{isset($request->priceEnd)?$request->priceEnd:''}}">
                            </label>
                            <input type="submit" value="Filtar" class="row trans-slow">
                        </form>
                    </ul>
                  </li> --}}
                  <li class="dropdown">
                    <input type="checkbox" />
                    <a href="#" data-toggle="dropdown">Filtrar Por:</a>
                    <ul class="dropdown-menu">
                        <a  class="row {{$arrPagina[0]=='lancamento'?'active':''}} " href="{{route('site.product.release')}}">Lançamento</a>
                        <a  class="row {{$arrPagina[0]=='promocao'?'active':''}} " href="{{route('site.product.promotion')}}">Promoções</a>
                        <a  class="row {{$arrPagina[0]=='mais-vendido'?'active':''}} " href="{{route('site.product.top')}}">Mais Vendidos</a>
                    </ul>
                  </li>
                </ul>
              </div>
            <div class="engloba-area-filter col-inline col-4">
                <div class="engloba-categoria contentSearch" style="display: none;">
                    <h4 class="titulo">Buscar</h4>
                    <form action="{{route('site.product.search')}}" id="seach" class="col-inline" method="POST">
                        @csrf
                        <input type="text" name="search" id="" class="col-inline" value="{{$search ?? ''}}">
                        <button type="submit" class="col-inline icon-text">&#xe816;</button>
                    </form>
                </div>
                <div class="engloba-categoria">
                    <div class="container">
                        <div class="central">
                            <h4 class="titulo">Categorias</h4>
                            <nav>
                                <ul>
                                    @foreach ($categories as $category)
                                    <li class="subcategoria trans-slow">
                                        <a href="{{route('site.product.category', ['category' => $category->slug])}}"class="@if (isset($categoryCurrent)) {{$categoryCurrent->id == $category->id?'active':''}} @endif @if (isset($subcategoryCurrent)) {{$subcategoryCurrent->category_id == $category->id?'active':''}} @endif" > {{$category->title}} </a>
                                        @if (COUNT($category->subcategory))
                                            <div class="engloba-sub-menu trans-slow" @if(isset($categoryCurrent)) {{$categoryCurrent->id == $category->id?'style=display:block':''}}@endif @if(isset($subcategoryCurrent)) {{$subcategoryCurrent->category_id == $category->id?'style=display:block':''}}@endif>
                                                <ul>
                                                    @foreach ($category->subcategory as $subcategory)
                                                    <li><a href="{{route('site.product.subcategory', ['subcategory' => $subcategory->slug])}}" class=""> {{$subcategory->title}} </a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                @if ($brands->count() > 0)
                    <div class="engloba-categoria">
                        <div class="container">
                            <div class="central">
                                <h4 class="titulo" style="font-size: 20px;">Marcas</h4>
                                <nav>
                                    <ul>
                                        @foreach ($brands as $brand)
                                        <li class="subcategoria trans-slow">
                                            @switch($field)
                                                @case('products')
                                                    <a href="{{route('site.product.productBrand', ['productBrand' => $brand->slug])}}"class="@if (isset($brandCurrent)) {{$brandCurrent->id == $brand->id?'active':''}} @endif " > {{$brand->name}} </a>
                                                @break
                                                @case('category')
                                                    <a href="{{route('site.product.productBrandCategory', ['category' => $brand->category_slug, 'productBrand' => $brand->slug])}}" class="@if (isset($brandCurrent)) {{$brandCurrent->id == $brand->id?'active':''}} @endif " > {{$brand->name}} </a>
                                                @break
                                                @case('subcategory')
                                                    <a href="{{route('site.product.productBrandSubcategory', ['category' => $brand->category_slug, 'subcategory' => $brand->subcategory_slug, 'productBrand' => $brand->slug])}}"class="@if (isset($brandCurrent)) {{$brandCurrent->id == $brand->id?'active':''}} @endif " > {{$brand->name}} </a>
                                                @break
                                            @endswitch
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="engloba-categoria estampas">
                    <div class="container">
                        <div class="central">
                            <h4 class="titulo" style="font-size: 20px;">Cores e estampas</h4>
                            <nav>
                                <ul>
                                    @foreach ($colors as $color)
                                    <li class="subcategoria trans-slow">
                                        @switch($field)
                                            @case('products')
                                                <a href="{{route('site.product.productColors', ['productColor' => $color->productColorId])}}"class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                            @break
                                            @case('category')
                                                <a href="{{route('site.product.productColorCategory', ['category' => $color->category_slug, 'productColor' => $color->productColorId])}}" class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                            @break
                                            @case('subcategory')
                                                <a href="{{route('site.product.productColorSubcategory', ['category' => $color->category_slug, 'subcategory' => $color->subcategory_slug, 'productColor' => $color->productColorId])}}"class="@if (isset($colorCurrent)) {{$colorCurrent->id == $color->productColorId?'active':''}} @endif " > {{$color->name}} </a>
                                            @break
                                        @endswitch
                                    </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="filter-date">
                    <div class="container">
                        <div class="central">
                            <div class="engloba-filter-date">
                                <h4 class="titulo">Filtrar Por:</h4>
                                <a  class="row {{$arrPagina[0]=='lancamento'?'active':''}} " href="{{route('site.product.release')}}">Lançamento</a>
                                <a  class="row {{$arrPagina[0]=='promocao'?'active':''}} " href="{{route('site.product.promotion')}}">Promoções</a>
                                <a  class="row {{$arrPagina[0]=='mais-vendido'?'active':''}} " href="{{route('site.product.top')}}">Mais Vendidos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="multi-view multi-product col-inline col-8">
                <div class="menu-order">
                    <div class="descricao-pag col-inline col-4">
                        @if (isset($categoryCurrent) && !isset($subcategoryCurrent))
                            <div class="image col-inline" style="background-image:url({{asset('storage/admin/uploads/fotos')}}/{{$categoryCurrent->path_image}});"></div>
                        @endif
                        @if (isset($subcategoryCurrent))
                            <div class="image col-inline" style="background-image:url({{asset('storage/admin/uploads/fotos')}}/{{$subcategoryCurrent->path_image}});"></div>
                        @endif

                        <div class="descricao col-inline">
                            @if (!isset($arrPagina[1]))
                                <h4 class="titulo"> Todos os Produtos</h4>
                            @endif
                            @if (isset($categoryCurrent) && !isset($subcategoryCurrent))
                                <h4 class="titulo"> {{$categoryCurrent->title}}</h4>
                            @endif
                            @if (isset($subcategoryCurrent))
                                <h4 class="titulo"> {{$subcategoryCurrent->category}}</h4>
                                <p>{{$subcategoryCurrent->title}}</p>
                            @endif

                            @if (isset($colorCurrent) && isset($subcategoryCurrent))
                                <p style="font-size: 13px;">{{$colorCurrent->name}}</p>
                            @elseif(isset($colorCurrent) && isset($categoryCurrent))
                                <p style="font-size: 13px;">{{$colorCurrent->name}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="eng-btn-products dir">
                        <div class="type-order col-inline">
                            <a href="javscript::" class="trans-slow">Ordenar Por</a>
                        </div>
                        <div class="mode-view col-inline">
                            <a href="javascript::" class="col-inline icon-text view-default">&#xe824;</a>
                            <a href="javascript::" class="col-inline icon-text list-view">&#xe826;</a>
                        </div>
                    </div>
                </div>

                <section id="semana-oferta" class="oferta-exclusiva produto" >
                     <div class="wrap">
                        <div class="descricao">
                            <h3 class="titulo">Renove sua Casa</h3>
                            <h2 class="subtitulo">Tintas com 50% off</h2>
                        </div>
                    </div>
                </section>

                <div id="products" class="produto">
                    @foreach ($products as $product)
                        <div class="box-grid col-inline col-x3 trans-slow">
                            <div class="content" style="border:solid 1px {{$category->color}};">
                                {{-- <div class="curtida col-inline">
                                    <a href="javascript:void(0)" class="link-full" onclick="addFavorite(this, '{{route('site.addFavorite')}}', {{$product->id}})"></a>
                                    <div class="like"><img src="{{asset('site/assets/images/like.svg')}}"></div>
                                </div> --}}

                                <span style="border:solid 1px {{$category->color}};"></span>

                                <a href="{{route('site.product.productContent', ['category' => $product->category_id, 'subcategory' => $product->subcategory_id, 'product' => $product->slug])}}" class="link-full"></a>

                                <div class="carousel-galeria-produto owl-carousel">
                                    @foreach ($product->gallery as $gallery)
                                        <div class="image" style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$gallery->path_image}});">
                                            <a href="{{route('site.product.productContent', ['product' => $product->slug])}}" class="link-full"></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="descricao">
                                    <h4 class="titulo">{{ $product->title }}</h4>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    <div id="paginations">
                        @php
                            $Parametro1 = isset($arrPagina[1]) ? $arrPagina[1] : '';
                        @endphp

                        @if ($arrPagina[0] <> 'filtro-preco' && $Parametro1 <> 'search')
                        {{$products->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
