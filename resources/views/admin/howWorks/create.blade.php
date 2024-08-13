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
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Listagem Categoria</a></li>
                                <li class="breadcrumb-item active">Cadastro Categoria</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Categoria</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Titulo</label>
                                            <input type="text" id="simpleinput" name="title" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Cor</label>
                                            <div id="component-colorpicker" class="input-group colorpicker-element" data-colorpicker-id="3">
                                                <input type="text" class="form-control input-lg" name="color" value="#284E95">
                                                <span class="input-group-append">
                                                    <span class="input-group-text colorpicker-input-addon" data-original-title="" title="" tabindex="0"><i style="background: rgb(0, 81, 243);"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="order">Ordem</label>
                                            <input type="text" id="order" name="order" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Categoria Ativa?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="featured" class="custom-control-input" id="destaque">
                                                    <label class="custom-control-label" for="destaque">Destaque?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6 mt-3">
                                        <input type="file" class="dropify" name="path_image" data-height="200" />
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
