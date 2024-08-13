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
                                <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Listagem de Produtos</a></li>
                                <li class="breadcrumb-item active">Cadastro de Produtos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Cadastro de Produtos</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria');" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Categoria <span class="text-danger">*</span></label>
                                            <select class="form-control filterSelect" data-route="{{ route('admin.filterSubcategory') }}" name="category_id" required id="category_id">
                                                <option selected disabled value=""></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="subcategory_id">Subategoria</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option selected></option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="brand_id">Marca</label>
                                            <select class="form-control" name="brand_id" id="brand_id">
                                                <option selected value="0"></option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="simpleinput" required name="title" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Código Referencia</label>
                                            <input type="text" id="simpleinput" name="reference_code" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Ordem</label>
                                            <input type="text" id="simpleinput" name="order" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" value="1" class="custom-control-input" id="active">
                                                    <label class="custom-control-label" for="active" >Produto Ativo?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="promotion" value="1" class="custom-control-input" id="promotion">
                                                    <label class="custom-control-label" for="promotion" >Produto promocional?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="brief_description">Breve descrição</label>
                                            <textarea class="form-control" name="brief_description" id="brief_description" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="product-description">Descrição do Produto</label>
                                            <textarea class="form-control" name="description" id="product-description" rows="5"></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="feature">Características</label>
                                            <textarea class="form-control" name="feature" id="feature" rows="5"></textarea>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <h4 class="mb-3 bg-light p-2 pt-1 mt-3 pb-1">Campos do produto</h4>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="inputs[]" value="image" class="custom-control-input" id="input_image">
                                                    <label class="custom-control-label" for="input_image" >Anexar Imagem</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="inputs[]" value="text" class="custom-control-input" id="input_text">
                                                    <label class="custom-control-label" for="input_text" >Frase (texto livre)</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-4">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="inputs[]" value="color" class="custom-control-input" id="input_color">
                                                    <label class="custom-control-label" for="input_color" >Cor</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="productGallery">
                                            <h4 class="bg-light p-2 pt-1 mt-2 pb-1">Informações Técnicas <i class="font-13">(Usado para calcular o frete)</i></h4>
                                            <p class="mb-3">Essas informações referem-se as dimensões da caixa de envio, logo informar as especificações da mesma.</p>
                                            <div class="row">
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="width">Largura (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="width" required data-mask="000.00" data-mask-reverse="true" name="width" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="height">Autura (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="height" required data-mask="000.00" data-mask-reverse="true" name="height" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="length">Comprimento (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="length" required data-mask="000.00" data-mask-reverse="true" name="length" class="form-control">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="weigth">Peso Kg<span class="text-danger">*</span></label>
                                                    <input type="text" id="weigth" required data-mask="000,00" data-mask-reverse="true" name="weigth" class="form-control">
                                                </div>
                                            </div>
                                        </div>{{-- end productGallery --}}
                                        <div class="productGallery">
                                            <h4 class="mb-3 bg-light p-2 pt-1 mt-2 pb-1">Galeria de Imagens</h4>
                                            <div>
                                                <div id="contentImagesGalery" class="row col-12 p-0 m-0">
                                                    <div class="form-group col-12 col-md-4" id="inputUploadImageGallery">
                                                        <input type="file" multiple onchange="previewImageUpload(this, '#contentImagesGalery')" accept="image/*" name="path_image[]" id="path_image" class="form-control">
                                                        <label for="path_image">
                                                            <h5>Carregar Imagens</h5>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>{{-- end productGallery --}}
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
