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
                <div class="mine-destaque">
                    @foreach ($blogs as $blogReference)
                    <div class="box-mine-destaque trans-slow">
                        <div class="content">
                            <a href="{{route('site.blog.blogContent', ['blog' => $blogReference->id])}}" class="link-full"></a>
                            <div class="image">
                                <img src="{{asset('storage/admin/uploads/fotos/')}}/{{$blogReference->path_image}}" alt="{{$blogReference->title}}">
                            </div>
                            <div class="descricao">
                                <i class="publicado">Publicado: {{date('d/m/Y', strtotime($blogReference->publishing))}}</i>
                                <h4 class="titulo">{{$blogReference->title}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{route('site.blog.index')}}" class="all-article trans-slow">Todos os Artigos</a>
                </div>
            </div>
            <div id="article_destaque"  class="article_destaque-inter col-inline col-9">
                <div class="image"style="background-image: url({{asset('storage/admin/uploads/fotos/')}}/{{$blog->path_image}});"></div>
                <div class="descricao">
                    <i class="date">Publicado: {{date('d/m/Y', strtotime($blog->publishing))}}</i>
                    <h4 class="titulo">{{$blog->title}}</h4>
                    <h5 class="subtitulo">{{$blog->description}}</h5>
                    {!! $blog->text !!}
                </div>
                <a href="{{URL::previous()}}" class="volta col-inline trans-slow">Voltar</a>
                <div class="compartilha dir">
                    <p>Compartilhar</p>
                    <a href="" class="col-inline trans-slow icon-text">&#xeadc;</a>
                    <a href="" class="col-inline trans-slow icon-text">&#xf16d;</a>
                    <a href="" class="col-inline trans-slow icon-text">&#xf309;</a>
                    <a href="" class="col-inline trans-slow icon-text">&#xe9b0;</a>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
