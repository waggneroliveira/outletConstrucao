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
                                <li class="breadcrumb-item"><a href="{{ route('admin.customer.edit', ['customer' => $address->customer_id]) }}">Listagem Cliente</a></li>
                                <li class="breadcrumb-item active">Editar Endereço</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Endereço</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.address.update', ['address' => $address->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="customer_id">Cliente</label>
                                            <input type="text" disabled id="customer_id" class="form-control" value="{{ $customer->name }}">
                                            <input type="hidden" id="customer_id" required name="customer_id" class="form-control" value="{{ $customer->id }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="public_place">Logradouro <span class="text-danger">*</span></label>
                                            <input type="text" id="public_place" required name="public_place" class="form-control" value="{{ $address->public_place }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="number">Número <span class="text-danger">*</span></label>
                                            <input type="text" id="number" required name="number" class="form-control" value="{{ $address->number }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="zip_code">CEP <span class="text-danger">*</span></label>
                                            <input type="text" id="zip_code" data-mask="00.000-000" required name="zip_code" class="form-control" value="{{ $address->zip_code }}">
                                        </div>

                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="complement">Complemento</label>
                                            <input type="text" id="complement" name="complement" class="form-control" value="{{ $address->complement }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="reference">Ponto de Referência <span class="text-danger">*</span></label>
                                            <input type="text" id="reference" required name="reference" class="form-control" value="{{ $address->reference }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="region_id">Bairro (Taxa de entrega) <span class="text-danger">*</span></label>
                                            <select class="form-control" name="region_id" required id="region_id">
                                                <option selected disabled value=""></option>
                                                @foreach($regions as $region)
                                                    <option value="{{ $region->id }}" {{ $address->region_id == $region->id ? 'selected' : '' }}>{{ $region->title }} R$ {{ $region->amount }}</option>
                                                @endforeach
                                            </select>
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
