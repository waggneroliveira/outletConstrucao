@extends('admin.layouts.app')
@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('painel') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Postagens</a></li>
                                <li class="breadcrumb-item active">Editar Postagem</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Postagem</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="ml-auto col-lg-4">
                                    <div class="text-lg-right">
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Salvar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" action="{{ route('admin.post.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="link">Link</label>
                                            <input type="text" id="link" name="link" class="form-control" value="{{ $post->link }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Tipo Link</label>
                                            <select class="form-control" name="type_link" required id="example-select">
                                                <option {{$post->type_link==1?'selected':''}} value="1">Normal</option>
                                                <option {{$post->type_link==2?'selected':''}} value="2">Nova Janela</option>
                                            </select>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-select">Imagem</label>
                                            <input type="file" class="dropify" name="path_image" data-height="200" data-default-file="{{ url('storage/admin/uploads/fotos') }}/{{ $post->path_image }}"/>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                                <!-- end row -->
                            </form>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->


@endsection
