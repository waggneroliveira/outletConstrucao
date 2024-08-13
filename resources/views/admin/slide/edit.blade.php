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
                                <li class="breadcrumb-item"><a href="{{ route('admin.slide.index') }}">Listagem Banners</a></li>
                                <li class="breadcrumb-item active">Editar Banner</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Banner</h4>
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

                            <form id="formCategoria" action="{{ route('admin.slide.update', ['slide' => $slide->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Título</label>
                                            <input type="text" id="simpleinput" name="title" class="form-control" value="{{ $slide->title }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Subtitulo</label>
                                            <input type="text" id="simpleinput" name="subtitle" class="form-control" value="{{ $slide->subtitle }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Link do produto</label>
                                            <select class="form-control" name="product_id" required id="example-select">
                                                <option selected value="0"></option>
                                                @foreach($products as $product)
                                                    <option {{ $slide->product_id == $product->id ? 'selected' : '' }} value="{{ $product->id }}">{{ $product->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Descricao</label>
                                            <textarea name="description" id="simpleinput" cols="30" rows="10" class="form-control">{{ $slide->description }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Texto do botão WhatsApp</label>
                                            <input type="text" id="simpleinput" placeholder="deixar em branco para ocultar o botão" name="whatsapp_button" class="form-control" value="{{ $slide->whatsapp_button }}">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-select">Imagem Desktop</label>
                                            <input type="file" class="dropify" name="path_image" data-height="200" data-default-file="{{ url('storage/admin/uploads/fotos') }}/{{ $slide['path_image'] }}"/>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Imagem Mobile</label>
                                            <input type="file" class="dropify" name="path_image_mobile" data-height="200" data-default-file="{{ url('storage/admin/uploads/fotos') }}/{{ $slide['path_image_mobile'] }}"/>
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
