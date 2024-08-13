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
                                <li class="breadcrumb-item active">Listagem de Tamanhos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tamanhos</h4>
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
                                        <a href="{{ route('admin.productSize.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="80px" class="text-center">COD.</th>
                                            <th>Tamanho</th>
                                            <th width="100px" class="text-center">Exibe tabela?</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productSizes as $productSize)
                                        <tr>
                                            <td class="text-center"><b>{{ $productSize->id }}</b></td>
                                            <td>{{ $productSize->title }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <form action="{{ route('admin.productSize.editSize', ['productSize' => $productSize->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="field" value="sizeChart">
                                                        <input type="checkbox" name="sizeChart" value="1" {{ $productSize->sizeChart == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="sizeChart{{ $productSize->id }}">
                                                        <label class="custom-control-label" for="sizeChart{{ $productSize->id }}">&nbsp;</label>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <form action="{{ route('admin.productSize.editSize', ['productSize' => $productSize->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="field" value="active">
                                                        <input type="checkbox" name="active" value="1" {{ $productSize->active == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $productSize->id }}">
                                                        <label class="custom-control-label" for="checkActived{{ $productSize->id }}">&nbsp;</label>
                                                    </form>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.productSize.edit',['productSize' => $productSize->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.productSize.destroy',['productSize' => $productSize->id]) }}" method="post">
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
