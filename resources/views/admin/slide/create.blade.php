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
                                <li class="breadcrumb-item active">Cadastro Banner</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Banner</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.slide.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Título</label>
                                            <input type="text" id="simpleinput" name="title" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Subtitulo</label>
                                            <input type="text" id="simpleinput" name="subtitle" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Link do produto</label>
                                            <select class="form-control" name="product_id" id="example-select">
                                                <option selected value="0"></option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Descricao</label>
                                            <textarea name="description" id="simpleinput" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Texto WhatsApp</label>
                                            <input type="text" id="simpleinput" name="whatsapp_button" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-select">Imagem Desktop <span class="text-danger">*</span></label>
                                            <input type="file" class="dropify" name="path_image" data-height="200" />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Imagem Mobile</label>
                                            <input type="file" class="dropify" name="path_image_mobile" data-height="200" />
                                        </div>
                                    </div><!-- end col -->
                                </div>
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
