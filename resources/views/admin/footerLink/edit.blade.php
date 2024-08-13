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
                                <li class="breadcrumb-item"><a href="{{ route('admin.footerLink.index') }}">Listagem Links</a></li>
                                <li class="breadcrumb-item active">Editar Link do Rodapé</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Link do Rodapé</h4>
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

                            <form id="formCategoria" action="{{ route('admin.footerLink.update', ['footerLink' => $footerLink->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <label for="simpleinput">Titulo</label>
                                                <input type="text" id="simpleinput" name="title_link" value="{{ $footerLink->title_link }}" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <label for="simpleinput">Titulo Popup</label>
                                                <input type="text" id="simpleinput" name="title_modal" value="{{ $footerLink->title_modal }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-12 col-md-6">
                                            <div class="custom-control custom-checkbox form-check">
                                                <input type="checkbox" @if($footerLink->active==1) checked @endif  name="active" class="custom-control-input" id="active" value="1">
                                                <label class="custom-control-label" for="active">Ativo?</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="text_footerLink">Texto</label>
                                            <textarea class="form-control" name="text" id="text_footerLink" rows="5">{{ $footerLink->text }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="politicaTroca">Arquivo</label>
                                            <input type="file" class="dropify" id="politicaTroca" accept="application/pdf" name="path_archive" data-default-file="{{asset('storage/admin/uploads/fotos')}}/{{ $footerLink->path_archive}}" data-height="150" />
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
