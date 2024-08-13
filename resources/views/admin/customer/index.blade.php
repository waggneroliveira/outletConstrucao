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
                                <li class="breadcrumb-item active">Clientes</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Clientes</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-4 ml-auto">
                                    <div class="text-lg-right">
                                        <a href="{{ route('admin.customer.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                    </div>
                                </div><!-- end col-->
                            </div>
                            <a id="btnExport" class="btn btn-secondary buttons-pdf buttons-html5" href="{{route('ajaxExcel')}}">Excel</a>
                            <div class="table-responsive">
                                <table id="datatable-buttons" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>CPF</th>
                                            <th>Telefone</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->cpf }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <form action="{{ route('admin.customer.editcustomer', ['customer' => $customer->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="field" value="promotion">
                                                        <input type="checkbox" name="active" value="1" class="checkbox-ajax custom-control-input checkboxOpcao" id="checkActive{{ $customer->id }}" {{ $customer->active == 1 ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="checkActive{{ $customer->id }}">&nbsp;</label>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.customer.edit',['customer' => $customer->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.customer.destroy',['customer' => $customer->id]) }}" method="post">
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
                            <iframe id="txtArea1" style="display:none"></iframe>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->


@endsection
