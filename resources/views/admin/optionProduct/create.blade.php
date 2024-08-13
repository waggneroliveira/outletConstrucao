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
                                <li class="breadcrumb-item"><a href="{{ route('admin.productOptionCategory.edit',['categoryOption' => $categoryOption->product_id]) }}"> {{$categoryOption->title}} </a></li>
                                <li class="breadcrumb-item active">Cadastro de Opções</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro de Produtos</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productOption.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" required name="category_id" value="{{$categoryOption->id}}">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="title">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="title" required name="title" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="required" class="custom-control-input" id="required">
                                                    <label class="custom-control-label" for="required">Escolha obrigatória?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Opção Ativa?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="title">Valor R$ <span class="text-danger">*</span></label>
                                            <input type="text" id="title" data-mask="000.000.000,00" data-mask-reverse="true" required name="amount" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="title">Quantidade <span class="text-danger">*</span></label>
                                            <input type="text" data-mask="00000" id="title" required name="quantity" class="form-control">
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
