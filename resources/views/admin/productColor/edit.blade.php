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
                                <li class="breadcrumb-item"><a href="{{ route('admin.productColor.index') }}">Listagem de Tamanhos</a></li>
                                <li class="breadcrumb-item active">Editar Cor</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Cor</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.productColor.update', ['productColor' => $productColor->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Nome</label>
                                            <div id="name" class="input-group" title="Using format option">
                                                <input type="text" class="form-control input-lg" value="{{$productColor->name}}" name="name"/>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="color">Cor</label>
                                            <div id="component-colorpicker" class="input-group" title="Using format option">
                                                <input type="text" class="form-control input-lg" name="color" value="{{$productColor->color}}"/>
                                                <span class="input-group-append">
                                                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-12 col-md-6 mt-2">
                                            <div class="custom-control custom-checkbox form-check">
                                                <input type="checkbox" name="active" {{$productColor->active=1?'checked':''}} class="custom-control-input" id="active">
                                                <label class="custom-control-label" for="active">Cor Ativa?</label>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="path_image">Estampa</label>
                                            <input type="file" class="dropify" name="path_image" data-default-file="{{ url('storage/admin/uploads/fotos') }}/{{ $productColor->path_image}}" data-height="200" />
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
