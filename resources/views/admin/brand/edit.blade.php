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
                                <li class="breadcrumb-item"><a href="{{ route('admin.brand.index') }}">Listagem Marcas</a></li>
                                <li class="breadcrumb-item active">Editar Marca</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Marca</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Salvar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" action="{{ route('admin.brand.update', ['brand' => $brand->slug]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Nome</label>
                                            <input type="text" id="simpleinput" name="name" value="{{ $brand->name }}" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" @if($brand->active==1) checked @endif  name="active" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active">Ativa?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6 mt-3">
                                        <input type="file" class="dropify" name="path_image" data-default-file="{{asset('storage/admin/uploads/fotos')}}/{{ $brand->path_image}}" data-height="200" />
{{--                                        <input type="file" class="dropify" name="path_image" data-default-file="{{ Storage::url('admin/uploads/fotos') }}/{{ $brand['path_image'] }}" data-height="300" />--}}
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
