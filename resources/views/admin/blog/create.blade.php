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
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Listagem Categoria</a></li>
                                <li class="breadcrumb-item active">Cadastro Categoria</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro Categoria</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-select">Categoria *</label>
                                            <select class="form-control" name="category_id" required id="example-select">
                                                <option selected disabled value=""></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="title">Titulo</label>
                                            <input type="text" id="title" name="title" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="publishing">Publicação</label>
                                            <input type="text" id="publishing" data-mask="00/00/0000" name="publishing" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description">Breve Descrição</label>
                                            <textarea id="description" name="description" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="product-description">Texto</label>
                                            <textarea class="form-control" name="text" id="product-description" rows="5"></textarea>
                                        </div>
                                        <input type="file" class="dropify" name="path_image" data-height="200" />
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
