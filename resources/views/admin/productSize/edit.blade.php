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
                                <li class="breadcrumb-item"><a href="{{ route('admin.productSize.index') }}">Listagem de Tamanhos</a></li>
                                <li class="breadcrumb-item active">Editar Tamanho</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Tamanho</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Salvar alteração</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productSize.update', ['productSize' => $productSize->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="simpleinput" value="{{ $productSize->title }}" required name="title" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6 mt-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" value="1" class="custom-control-input" id="active" {{ $productSize->active == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="active" >Tamanho Ativo?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6 mt-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="sizeChart" value="1" class="custom-control-input" id="sizeChart" {{ $productSize->sizeChart == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="sizeChart" >Exibir Tabela?</label>
                                                </div>
                                            </div>
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
