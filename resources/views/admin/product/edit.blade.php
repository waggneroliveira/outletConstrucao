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
                                <li class="breadcrumb-item active">Editar Produto</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Produto</h4>
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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.product.update', ['product' => $product->slug]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Categoria <span class="text-danger">*</span></label>
                                            <select class="form-control filterSelect" data-route="{{ route('admin.filterSubcategory') }}" name="category_id" required id="category_id">
                                                <option selected disabled value=""></option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="subcategory_id">Subategoria</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option selected></option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="brand_id">Marca</label>
                                            <select class="form-control" name="brand_id" id="brand_id">
                                                <option selected value="0"></option>
                                                @foreach($brands as $brand)
                                                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="simpleinput" value="{{ $product->title }}" required name="title" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Código Referencia</label>
                                            <input type="text" id="simpleinput" value="{{ $product->reference_code }}" name="reference_code" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Ordem</label>
                                            <input type="text" id="simpleinput" value="{{ $product->order }}" name="order" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="active" value="1" class="custom-control-input" id="active" {{ $product->active == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="active" >Produto Ativo?</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" name="promotion" value="1" class="custom-control-input" id="promotion" {{ $product->promotion == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="promotion" >Produto Promocional?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="brief_description">Breve descrição</label>
                                            <textarea class="form-control" name="brief_description" id="brief_description" rows="5">{{ $product->brief_description }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="product-description">Descrição do Produto</label>
                                            <textarea class="form-control" name="description" id="product-description" rows="5">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="product-feature">Características</label>
                                            <textarea class="form-control" name="feature" id="product-feature" rows="5">{{ $product->feature }}</textarea>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="productGallery">
                                            <h4 class="bg-light p-2 pt-1 mt-2 pb-1">Informações Técnicas <i class="font-13">(Usado para calcular o frete)</i></h4>
                                            <p class="mb-3">Informar as dimensões do produto pronto para ser embalado. <b>Obs.:</b> Caso não informe, será cadastrado dimensões minima para o frete.</p>
                                            <div class="row">
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="width">Largura (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="width" required data-mask="000.00" data-mask-reverse="true" name="width" class="form-control" value="{{$product->width}}">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="height">Autura (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="height" required data-mask="000.00" data-mask-reverse="true" name="height" class="form-control" value="{{$product->height}}">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="length">Comprimento (cm)<span class="text-danger">*</span></label>
                                                    <input type="text" id="length" required data-mask="000.00" data-mask-reverse="true" name="length" class="form-control" value="{{$product->length}}">
                                                </div>
                                                <div class="form-group mb-3 col-12 col-md-6">
                                                    <label for="weigth">Peso Kg<span class="text-danger">*</span></label>
                                                    <input type="text" id="weigth" required data-mask="000,00" data-mask-reverse="true" name="weigth" class="form-control" value="{{$product->weigth}}">
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
                                                    @foreach($galeries as $gallery)
                                                    <div class="thumbPrev col-12 col-md-4">
                                                        <div style="background-image: url({{ url('storage/admin/uploads/fotos') }}/{{ $gallery->path_image }})">
                                                            <div class="opcaoImage btn-secondary row">
                                                                <div class="custom-radio">
                                                                    <input type="radio" data-product-id="{{ $product->id }}" data-route="{{ route('admin.productGallery.update', ['product_gallery' => $gallery->id]) }}" id="cover{{$gallery->id}}" value="1" name="product_cover" class="btnProductCover custom-control-input" {{ $gallery->product_cover == 1 ? 'checked' : '' }}>
                                                                    <label class="custom-control-label" for="cover{{$gallery->id}}">Capa</label>
                                                                </div>
                                                                <a href="{{ route('admin.productGallery.destroy', ['product_gallery' => $gallery->id]) }}" class="btnGalleryDestroy ml-auto"><i class="mdi mdi-24px mdi-delete-circle text-danger" style="display: table;margin-top: -8px;margin-bottom: -8px;"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>{{-- end productGallery --}}
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="productOptions col-12 mb-3">
                                <div class="bg-light p-2 row mb-3">
                                    <h4 class="text-uppercase">Estoque</h4>
                                    <a href="javascript::" data-toggle="modal" data-target="#modal-register-stock" class="ml-auto btn btn-success waves-effect waves-light"><i class="mdi mdi-basket mr-1"></i> Inserir Estoque</a>
                                </div>
                                <div class="table-responsive" style="margin-right: -12px;margin-left: -12px;">
                                    <table class="table dt-responsive nowrap mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="80px" class="text-center">COD.</th>
                                                <th>Tamanho</th>
                                                <th>Cor/estampa</th>
                                                <th class="text-center">Valor R$</th>
                                                <th class="text-center">Valor Promocional R$</th>
                                                <th class="text-center">Estoque</th>
                                                <th width="60px" class="text-center">Ativo?</th>
                                                <th width="110px" class="text-center">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($stocks as $stock)
                                            <tr>
                                                <td class="text-center"><b>{{ $stock->id }}</b></td>
                                                <td>{{ $stock->title }}</td>
                                                <td>{{ $stock->name }}</td>
                                                <td class="text-center">{{ number_format($stock->amount, 2,',','.') }}</td>
                                                <td class="text-center">{{ $stock->promotion_value?number_format($stock->promotion_value, 2,',','.'):'' }}</td>
                                                <td class="text-center">{{ $stock->quantity }}</td>
                                                <td class="text-center">
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{ route('admin.stock.editStock', ['stock' => $stock->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="field" value="active">
                                                            <input type="checkbox" name="active" {{ $stock->active == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $stock->id }}">
                                                            <label class="custom-control-label" for="checkActived{{ $stock->id }}">&nbsp;</label>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                <a href="javascript::" data-toggle="modal" data-target="#modal-edit-stock-{{$stock->id}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{ route('admin.stock.destroy',['stock' => $stock->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                    </form>

                                                    <div class="modal fade show" id="modal-edit-stock-{{$stock->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0 d-block">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title">Editar Estoque</h4>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form  class="needs-validation" novalidate id="form-edit-stock-{{$stock->id}}" method="post" action=" {{ route('admin.stock.update',['stock' => $stock->id]) }} ">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="productSize_id">Tamanho <span class="text-danger">*</span></label>
                                                                            <select class="form-control filterSelect" data-route="{{ route('admin.filterSubcategory') }}" name="productSize_id" required id="productSize_id">
                                                                                <option selected disabled value=""></option>
                                                                                @foreach($productSizes as $productSize)
                                                                                    <option value="{{ $productSize->id }}" {{$stock->productSize_id == $productSize->id?'selected':''}} >{{ $productSize->title }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="productSize_id">Cor <span class="text-danger">*</span></label>
                                                                            <select class="form-control filterSelect" data-route="{{ route('admin.filterSubcategory') }}" name="productColor_id" required id="productColor_id">
                                                                                <option selected disabled value=""></option>
                                                                                @foreach($productColors as $productColor)
                                                                                    <option value="{{ $productColor->id }}" {{$stock->productColor_id == $productColor->id?'selected':''}} >{{ $productColor->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="amount">Valor R$</label>
                                                                            <input type="text" id="amount" data-mask="000.000.000,00" data-mask-reverse="true" name="amount" class="form-control" value="{{$stock->amount}}">
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="promotion_value">Valor Promocional R$</label>
                                                                            <input type="text" id="promotion_value" data-mask="000.000.000,00" data-mask-reverse="true" name="promotion_value" class="form-control" value="{{$stock->promotion_value}}">
                                                                        </div>
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="quantity">Estoque</label>
                                                                            <input type="text" id="quantity" data-mask-reverse="true" name="quantity" class="form-control" value="{{$stock->quantity}}">
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group mb-3 col-12 col-md-6 text-left">
                                                                                <div class="custom-control custom-checkbox form-check">
                                                                                    <input type="checkbox" name="active" {{$stock->active == 1?'checked':''}} class="custom-control-input" id="active_stock_{{$stock->id}}">
                                                                                    <label class="custom-control-label" for="active_stock_{{$stock->id}}">Ativo?</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                    <div class="text-right">
                                                                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" onclick="submitForm('#form-edit-stock-{{$stock->id}}')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
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
    <div class="modal fade show" id="modal-register-tag" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Adicionar Etiqueta</h4>
                </div>
                <div class="modal-body p-4">
                    <form  id="form-register-tag" method="post" action=" {{ route('admin.productTag.store') }} ">
                        @csrf
                        <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                        <div class="form-group">
                            <label class="control-label">Etiquetas</label>
                            <select class="form-control form-white" required name="tag_id">
                                <option disabled selected value="0">Selecionar</option>
                                @foreach ($tags as $tag)
                                    <option value=" {{ $tag->id }} " >{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <div class="text-right">
                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="submitForm('#form-register-tag')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>

    <div class="modal fade show" id="modal-register-stock" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Inserir Estoque</h4>
                </div>
                <div class="modal-body p-4">
                    <form  class="needs-validation" novalidate id="form-register-opcao" method="post" action=" {{ route('admin.stock.store') }} ">
                        @csrf
                        <input type="hidden" name="product_id" value=" {{ $product->id }} ">
                        <div class="form-group mb-3">
                            <label for="productSize_id">Tamanho <span class="text-danger">*</span></label>
                            <select class="form-control" name="productSize_id" required id="productSize_id">
                                <option selected disabled value="">--- Tamanhos ---</option>
                                @foreach($productSizes as $productSize)
                                    <option value="{{ $productSize->id }}">{{ $productSize->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="productColor_id">Cor <span class="text-danger">*</span></label>
                            <select class="form-control" name="productColor_id" required id="productColor_id">
                                <option selected disabled value="">--- Cor ---</option>
                                @foreach($productColors as $productColor)
                                    <option value="{{ $productColor->id }}">{{ $productColor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="amount">Valor R$</label>
                            <input type="text" id="amount" data-mask="000.000.000,00" data-mask-reverse="true" name="amount" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-left">
                            <label for="promotion_value">Valor Promocional R$</label>
                            <input type="text" id="promotion_value" data-mask="000.000.000,00" data-mask-reverse="true" name="promotion_value" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="quantity">Estoque</label>
                            <input type="number" id="quantity" name="quantity" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-12 col-md-6">
                                <div class="custom-control custom-checkbox form-check">
                                    <input type="checkbox" name="active" class="custom-control-input" id="active_stock">
                                    <label class="custom-control-label" for="active_stock">Ativo?</label>
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

    <div class="modal fade show" id="modal-register-productModel" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Inserir Modelo</h4>
                </div>
                <div class="modal-body p-4">
                    <form  class="needs-validation" novalidate id="form-register-productModel" method="post" action=" {{ route('admin.productModel.store') }} " enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group mb-3">
                            <label for="reference">Código Referência</label>
                            <input type="text" id="reference" data-mask-reverse="true" name="reference" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="path_image_model">Imagem</label>
                            <input type="file" class="dropify" name="path_image" data-height="200" />
                        </div>
                    </form>

                    <div class="text-right">
                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="submitForm('#form-register-productModel')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>


@endsection
