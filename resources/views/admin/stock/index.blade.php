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
                                <li class="breadcrumb-item active">Gerenciamento de Estoques</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Gerenciamento de Estoques</h4>
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

                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped nowrap table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="30px">Código</th>
                                            <th>Produto</th>
                                            <th class="text-center">Cor</th>
                                            <th width="80px" class="text-center">Tamanho</th>
                                            <th width="30px" class="text-center">Quantidade</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stocks as $stock)
                                        <tr>
                                            <td><b>{{ $stock->id }}</b></td>
                                            <td>{{ $stock->product->title }}</td>
                                            <td class="text-center">{{ isset($stock->productColor)?$stock->productColor->name:'--' }}</td>
                                            <td class="text-center">{{ $stock->productSize->title }}</td>
                                            <td class="text-center">{{ $stock->quantity }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.product.edit',['product' => $stock->product->slug]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
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
