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
                                <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Listagem Clientes</a></li>
                                <li class="breadcrumb-item active">Cadastro Cliente</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Cliente</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Nome <span class="text-danger">*</span></label>
                                            <input type="text" id="name" required name="name" class="form-control" value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cpf">CPF <span class="text-danger">*</span></label>
                                            <input type="text" id="cpf" data-mask="000.000.000-40" required name="cpf" class="form-control" value="{{ old('cpf') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Telefone <span class="text-danger">*</span></label>
                                            <input type="text" id="phone" data-mask="#######-0000" data-mask-reverse="true" required name="phone" class="form-control" value="{{ old('phone') }}">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email">E-mail <span class="text-danger">*</span></label>
                                            <input type="text" id="email" required name="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Senha <span class="text-danger">*</span></label>
                                            <input type="password" id="password" required name="password" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox form-check">
                                                <input type="checkbox" checked name="active" value="1" value="" class="custom-control-input" id="active">
                                                <label class="custom-control-label" for="active">Cliente Ativo?</label>
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
