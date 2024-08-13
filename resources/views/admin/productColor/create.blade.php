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
                                <li class="breadcrumb-item"><a href="{{ route('admin.productColor.index') }}"> Listagem de Cores </a></li>
                                <li class="breadcrumb-item active">Cadastro de Cor</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro de Cor</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria');" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productColor.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Nome</label>
                                            <div id="name" class="input-group" title="Using format option">
                                                <input type="text" class="form-control input-lg" name="name"/>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Cor</label>
                                            <div id="component-colorpicker" class="input-group" title="Using format option">
                                                <input type="text" class="form-control input-lg" name="color" value="#305AA2"/>
                                                <span class="input-group-append">
                                                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6 mt-2">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Cor Ativa?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="path_image">Estampa</label>
                                            <input type="file" class="dropify" name="path_image" data-height="200" />
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->



@endsection
