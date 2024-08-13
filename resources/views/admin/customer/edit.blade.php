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
                                <li class="breadcrumb-item"><a href="{{ route('admin.customer.index') }}">Listagem Cliente</a></li>
                                <li class="breadcrumb-item active">Editar Cliente</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Cliente</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.customer.update', ['customer' => $customer->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="name">Nome <span class="text-danger">*</span></label>
                                            <input type="text" id="name" required name="name" class="form-control" value="{{ $customer->name }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cpf">CPF <span class="text-danger">*</span></label>
                                            <input type="text" id="cpf" required name="cpf" class="form-control" value="{{ $customer->cpf }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="phone">Telefone <span class="text-danger">*</span></label>
                                            <input type="text" id="phone" required name="phone" class="form-control" value="{{ $customer->phone }}">
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email">E-mail <span class="text-danger">*</span></label>
                                            <input type="text" id="email" required name="email" class="form-control" value="{{ $customer->email }}">
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox form-check">
                                                <input type="checkbox" checked name="active" value="1" {{ $customer->active == 1 ? 'checked' : '' }} class="custom-control-input" id="active">
                                                <label class="custom-control-label" for="active">Cliente Ativo?</label>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="bg-light p-2 row mb-3">
                                <h4 class="text-secondary">Endereços</h4>
                                <a href="{{ route('admin.address.create', ['customer' => $customer->id]) }}" class="ml-auto btn btn-success waves-effect waves-light"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Logradouro</th>
                                            <th>Número</th>
                                            <th>CEP</th>
                                            <th>Cidade</th>
                                            <th>Bairro</th>
                                            <th>Complemento</th>
                                            <th>Ponto de Referência</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adresses as $address)
                                        <tr>
                                            <td>{{ $address->public_place }}</td>
                                            <td>{{ $address->number }}</td>
                                            <td>{{ $address->zip_code }}</td>
                                            <td>{{ $address->city }}</td>
                                            <td>{{ $address->region }}</td>
                                            <td>{{ $address->complement }}</td>
                                            <td>{{ $address->reference }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.address.edit',['address' => $address->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.address.destroy',['address' => $address->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

@endsection
