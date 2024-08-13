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
                                <li class="breadcrumb-item"><a href="{{ route('admin.customer.edit', ['customer' => $customer->id]) }}">Cliente</a></li>
                                <li class="breadcrumb-item active">Cadastro Endereço</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Endereço</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.address.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="customer_id">Cliente</label>
                                            <input type="text" disabled id="customer_id" class="form-control" value="{{ $customer->name }}">
                                            <input type="hidden" id="customer_id" required name="customer_id" class="form-control" value="{{ $customer->id }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="zip_code">CEP <span class="text-danger">*</span></label>
                                            <input type="text" id="zip_code" data-mask="00000000" required name="zip_code" class="form-control" onchange="getCepContent(this, '#state', '#city', '#region', '#public_place')" value="{{ old('zip_code') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="state">Estado <span class="text-danger">*</span></label>
                                            <input type="text" id="state" required name="state" class="form-control" value="{{ old('state') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="city">Cidade <span class="text-danger">*</span></label>
                                            <input type="text" id="city" required name="city" class="form-control" value="{{ old('city') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="region">Bairro <span class="text-danger">*</span></label>
                                            <input type="text" id="region" required name="region" class="form-control" value="{{ old('region') }}">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="public_place">Logradouro <span class="text-danger">*</span></label>
                                            <input type="text" id="public_place" required name="public_place" class="form-control" value="{{ old('public_place') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="public_place">Número <span class="text-danger">*</span></label>
                                            <input type="text" id="number" required name="number" class="form-control" value="{{ old('number') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="complement">Complemento</label>
                                            <input type="text" id="complement" name="complement" class="form-control" value="{{ old('complement') }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="reference">Ponto de Referência <span class="text-danger">*</span></label>
                                            <input type="text" id="reference" required name="reference" class="form-control" value="{{ old('reference') }}">
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
