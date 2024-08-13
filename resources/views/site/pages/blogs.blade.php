@extends('site.layouts.app')
@section('content')
    <section id="article" class="secao artigo">
        <div class="wrap">
            <div class="engloba-article col-inline col-3">
                <div class="categoria">
                    <h4 class="titulo">Categorias</h4>
                </div>
                <ul class="topico-categoria">
                    @foreach ($categories as $category)
                        <li><a href="{{route('site.blog.category', ['category' => $category->id])}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div id="article_destaque" class="col-inline col-9">
                <h4 class="tituloo">Artigos em Destaque</h4>
                <div class="engloba-destaque">
                    @foreach ($blogs as $blog)
                    <div class="box-article-destaque col-inline col-x3 trans-slow">
                        <div class="content">
                            <a href="{{route('site.blog.blogContent', ['blog' => $blog->id])}}" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('storage/admin/uploads/fotos/')}}/{{$blog->path_image}}" alt="{{$blog->title}}">
                            </div>
                            <div class="descricao">
                                <i class="publicado">Publicado: {{date('d/m/Y', strtotime($blog->publishing))}}</i>
                                <h4 class="titulo">{{$blog->title}}</h4>
                                <p>{{$blog->description}}</p>
                            </div>
                            <a href="{{route('site.blog.blogContent', ['blog' => $blog->id])}}" class="btn">Continuar</a>
                        </div>
                    </div>
                    @endforeach

                    <div class="prev_next">
                        <a href="javascript::" class="col-inline trans-slow">01</a>
                        <a href="javascript::" class="col-inline trans-slow">02</a>
                        <a href="javascript::" class="col-inline trans-slow">03 </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
