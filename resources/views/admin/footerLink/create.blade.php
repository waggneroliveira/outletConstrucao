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
                                <li class="breadcrumb-item active">Cadastro Links do Rodapé</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Links do Rodapé</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.footerLink.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <label for="simpleinput">Titulo</label>
                                                <input type="text" id="simpleinput" name="title_link" value="{{ old('title_link') }}" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <label for="simpleinput">Titulo Popup</label>
                                                <input type="text" id="simpleinput" name="title_modal" value="{{ old('title_modal') }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-12 col-md-6">
                                            <div class="custom-control custom-checkbox form-check">
                                                <input type="checkbox" name="active" {{ old('active') == 1?'checked':'' }} class="custom-control-input" id="active" value="1">
                                                <label class="custom-control-label" for="active">Ativo?</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="text_footerLink">Texto</label>
                                            <textarea class="form-control" name="text" id="text_footerLink" rows="5">{{ old('text') }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="politicaTroca">Arquivo</label>
                                            <input type="file" class="dropify" accept="application/pdf" id="politicaTroca" name="path_archive" data-default-file="" data-height="150" />
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
