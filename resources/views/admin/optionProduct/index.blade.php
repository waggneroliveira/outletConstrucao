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
                                <li class="breadcrumb-item active">Listagem de Produtos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Listagem de Produtos</h4>
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
                                        <a href="{{ route('admin.product.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="80px" class="text-center">COD.</th>
                                            <th>Title</th>
                                            <th>Categoria/Subcategoria</th>
                                            <th width="110px" class="text-center">Valor R$</th>
                                            <th width="60px" class="text-center">Promoção?</th>
                                            <th width="110px" class="text-center">Valor Promoção R$</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td class="text-center"><b>{{ $product->id }}</b></td>
                                            <td>{{ $product->title }}</td>
                                            <th>{{ $product->category_title }} <span class="text-primary">-></span>{{ $product->subcategory_title }}</th>
                                            <th class="text-center">{{ str_replace('.', ',', $product->amount) }}</th>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <form action="{{ route('admin.product.editproduct', ['product' => $product->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="field" value="promotion">
                                                        <input type="checkbox" name="promotion" value="1" {{ $product->promotion == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input checkboxOpcao" id="checkPromotion{{ $product->id }}">
                                                        <label class="custom-control-label" for="checkPromotion{{ $product->id }}">&nbsp;</label>
                                                    </form>
                                                </div>
                                            </td>
                                            <th class="text-center">{{ str_replace('.', ',', $product->promotinal_value) }}</th>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <form action="{{ route('admin.product.editproduct', ['product' => $product->id]) }}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="field" value="active">
                                                        <input type="checkbox" name="active" value="1" {{ $product->active == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $product->id }}">
                                                        <label class="custom-control-label" for="checkActived{{ $product->id }}">&nbsp;</label>
                                                    </form>
                                                </div>
                                            </td>

                                            <td class="text-center">
                                                <a href="{{ route('admin.product.edit',['product' => $product->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.product.destroy',['product' => $product->id]) }}" method="post">
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
