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
                                <li class="breadcrumb-item"><a href="{{ route('admin.product.edit',['product' => $productOptionCategory->product_id]) }}"> {{$productOptionCategory->product_title}} </a></li>
                                <li class="breadcrumb-item active">Editar Categoria e opções</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Categoria e opções</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productOptionCategory.update', ['productOptionCategory' => $productOptionCategory->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="title">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="title" required name="title" class="form-control" value="{{$productOptionCategory->title}}">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="required" {{$productOptionCategory->required==1?'checked':''}} class="custom-control-input" id="required">
                                                    <label class="custom-control-label" for="required">Escolha obrigatória?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" {{$productOptionCategory->active==1?'checked':''}} class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Categoria Ativa?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="quantity_options">Limite Opções <i class="text-primary">(Quantidade de opções selecionada por categoria)</i> <span class="text-danger">*</span></label>
                                            <input type="text" id="quantity_options" data-mask="000" required name="quantity_options" class="form-control"  value="{{$productOptionCategory->quantity_options}}">
                                        </div>
                                    </div><!-- end col -->
                                </div>
                            </form>
                            <div class="productOptions col-12 mb-3">
                                <div class="bg-light p-2 row mb-3">
                                    <h4 class="text-uppercase">Opções do Produto</h4>
                                    <a href="javascript::" data-toggle="modal" data-target="#modal-register-opcao" class="ml-auto btn btn-success waves-effect waves-light"><i class="mdi mdi-basket mr-1"></i> Cadastrar Opção</a>
                                </div>
                                <div class="table-responsive" style="margin-right: -12px;margin-left: -12px;">
                                    <table class="table dt-responsive nowrap mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="80px" class="text-center">COD.</th>
                                                <th>Título</th>
                                                <th class="text-center">Valor R$</th>
                                                <th class="text-center">Quantidade</th>
                                                <th width="60px" class="text-center">Obrigatório</th>
                                                <th width="60px" class="text-center">Ativo?</th>
                                                <th width="110px" class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($productOptions as $productOption)
                                            <tr>
                                                <td class="text-center"><b>{{ $productOption->id }}</b></td>
                                                <td>{{ $productOption->title }}</td>
                                                <td class="text-center">{{ $productOption->amount?number_format($productOption->amount, 2, ',', '.'):'' }}</td>
                                                <td class="text-center">{{ $productOption->quantity }}</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{ route('admin.productOption.editProductOption', ['productOption' => $productOptionCategory->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="field" value="required">
                                                            <input type="checkbox" name="active" {{ $productOption->required == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $productOption->id }}">
                                                            <label class="custom-control-label" for="checkActived{{ $productOption->id }}">&nbsp;</label>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{ route('admin.productOption.editProductOption', ['productOption' => $productOption->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="field" value="active">
                                                            <input type="checkbox" name="active" {{ $productOption->active == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $productOptionCategory->id }}">
                                                            <label class="custom-control-label" for="checkActived{{ $productOption->id }}">&nbsp;</label>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript::" data-toggle="modal" data-target="#modal-edit-opcao-{{$productOption->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{ route('admin.productOption.destroy',['productOption' => $productOption->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                    </form>

                                                    <div class="modal fade show" id="modal-edit-opcao-{{$productOption->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0 d-block">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title">Adicionar Etiqueta</h4>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form  class="needs-validation" novalidate id="form-register-opcao-{{$productOption->id}}" method="post" action=" {{ route('admin.productOption.update', ['productOption'=>$productOption->id]) }} ">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="title">Titulo <span class="text-danger">*</span></label>
                                                                            <input type="text" id="title" required name="title" class="form-control" value="{{ $productOption->title }}">
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="quantity">Quantidade</label>
                                                                            <input type="text" id="quantity" data-mask="00000" required name="quantity" class="form-control" value="{{ $productOption->quantity }}">
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="amount">Valor R$</label>
                                                                            <input type="text" id="amount" data-mask="000.000.000,00" data-mask-reverse="true" name="amount" class="form-control" value="{{ $productOption->amount }}">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mb-3 col-12 col-md-6">
                                                                                <div class="custom-control custom-checkbox form-check">
                                                                                    <input type="checkbox" name="required" {{ $productOption->required == 1 ? 'checked' : ''}} class="custom-control-input" id="required_option_{{$productOption->id}}">
                                                                                    <label class="custom-control-label" for="required_option_{{$productOption->id}}">Escolha obrigatória?</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group mb-3 col-12 col-md-6">
                                                                                <div class="custom-control custom-checkbox form-check">
                                                                                    <input type="checkbox" name="active" {{ $productOption->active == 1 ? 'checked' : ''}} class="custom-control-input" id="active_option_{{$productOption->id}}">
                                                                                    <label class="custom-control-label" for="active_option_{{$productOption->id}}">Opção Ativa?</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                    <div class="text-right">
                                                                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" onclick="submitForm('#form-register-opcao-{{$productOption->id}}')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                                                                    </div>

                                                                </div> <!-- end modal-body-->
                                                            </div> <!-- end modal-content-->
                                                        </div> <!-- end modal dialog-->
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>{{-- end table-responsive --}}
                            </div>{{-- end productTag --}}
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <div class="modal fade show" id="modal-register-opcao" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Adicionar Etiqueta</h4>
                </div>
                <div class="modal-body p-4">
                    <form  class="needs-validation" novalidate id="form-register-opcao" method="post" action=" {{ route('admin.productOption.store') }} ">
                        @csrf
                        <input type="hidden" name="category_id" value=" {{ $productOptionCategory->id }} ">
                        <div class="form-group mb-3">
                            <label for="title">Titulo <span class="text-danger">*</span></label>
                            <input type="text" id="title" required name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quantity">Quantidade</label>
                            <input type="text" id="quantity" data-mask="00000" name="quantity" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="amount">Valor R$</label>
                            <input type="text" id="amount" data-mask="000.000.000,00" data-mask-reverse="true" name="amount" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-12 col-md-6">
                                <div class="custom-control custom-checkbox form-check">
                                    <input type="checkbox" name="required" class="custom-control-input" id="required_option">
                                    <label class="custom-control-label" for="required_option">Escolha obrigatória?</label>
                                </div>
                            </div>
                            <div class="form-group mb-3 col-12 col-md-6">
                                <div class="custom-control custom-checkbox form-check">
                                    <input type="checkbox" name="active" class="custom-control-input" id="active_option">
                                    <label class="custom-control-label" for="active_option">Opção Ativa?</label>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="text-right">
                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="submitForm('#form-register-opcao')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>


@endsection
