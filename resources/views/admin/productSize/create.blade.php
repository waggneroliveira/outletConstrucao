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
                                <li class="breadcrumb-item"><a href="{{ route('admin.productSize.index') }}"> Listagem de Tamanhos </a></li>
                                <li class="breadcrumb-item active">Cadastro de Tamanho</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro de Tamanho</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productSize.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="title">Tamanho <span class="text-danger">*</span></label>
                                            <input type="text" id="title" required name="title" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6 mt-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Tamanho Ativo?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6 mt-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="sizeChart" class="custom-control-input" id="sizeChart">
                                                    <label class="custom-control-label" for="sizeChart">Exibir tamanho?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
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
