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

                            <form id="formCategoria" class="needs-validation" novalidate action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
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
                                            <label for="simpleinput">Titulo <span class="text-danger">*</span></label>
                                            <input type="text" id="simpleinput" value="{{ $product->title }}" required name="title" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Valor R$ <span class="text-danger">*</span></label>
                                            <input type="text" id="simpleinput" value="{{ $product->amount }}" required name="amount" class="money form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Valor promocional R$ </label>
                                            <input type="text" id="simpleinput" value="{{ $product->promotinal_value }}" name="promotinal_value" class="money form-control">
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
                                                    <label class="custom-control-label" for="promotion">Promoção?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="subcategory_id">Subategoria</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option selected value="0"></option>
                                                @foreach($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="product-description">Descrição do Produto</label>
                                            <textarea class="form-control" name="description" id="product-description" rows="5">{{ $product->description }}</textarea>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                                <div class="productOptions col-12 mb-3">
                                    <div class="bg-light p-2 row mb-3">
                                        <h4 class="text-uppercase">Adicionais</h4>
                                        <a href="javascript::" data-toggle="modal" data-target="#modal-register-tag" class="ml-auto btn btn-success waves-effect waves-light"><i class="mdi mdi-basket mr-1"></i> Inserir Adicional</a>
                                    </div>
                                    <div class="table-responsive" style="margin-right: -12px;margin-left: -12px;">
                                        <table class="table dt-responsive nowrap mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th width="80px" class="text-center">COD.</th>
                                                    <th>Categoria</th>
                                                    <th class="text-center">Limite Opções</th>
                                                    <th width="60px" class="text-center">Obrigatório</th>
                                                    <th width="60px" class="text-center">Ativo?</th>
                                                    <th class="text-center">Ultima Atualização</th>
                                                    <th width="110px" class="text-center">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($productOptionCategories as $productOptionCategory)
                                                <tr>
                                                    <td class="text-center"><b>{{ $productOptionCategory->id }}</b></td>
                                                    <td>{{ $productOptionCategory->title }}</td>
                                                    <td>{{ $productOptionCategory->quantity_options }}</td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-checkbox">
                                                            <form action="{{ route('admin.productOptionCategory.editCategoryOption', ['categoryOption' => $productOptionCategory->id]) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="field" value="required">
                                                                <input type="checkbox" name="active" value="1" {{ $productOptionCategory->required == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $productOptionCategory->id }}">
                                                                <label class="custom-control-label" for="checkActived{{ $productOptionCategory->id }}">&nbsp;</label>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="custom-control custom-checkbox">
                                                            <form action="{{ route('admin.productOptionCategory.editCategoryOption', ['categoryOption' => $productOptionCategory->id]) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="field" value="active">
                                                                <input type="checkbox" name="active" value="1" {{ $productOptionCategory->active == 1 ? 'checked' : ''}} class="checkbox-ajax custom-control-input" id="checkActived{{ $productOptionCategory->id }}">
                                                                <label class="custom-control-label" for="checkActived{{ $productOptionCategory->id }}">&nbsp;</label>
                                                            </form>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.product.edit',['categoryOption' => $productOptionCategory->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                        <form class="action-icon" action="{{ route('admin.product.destroy',['categoryOption' => $productOptionCategory->id]) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>{{-- end table-responsive --}}
                                </div>{{-- end productTag --}}
                                <div class="row">
                                    <div class="productTag col-12 col-md-6 pl-3">
                                        <div class="bg-light p-2 row mb-3">
                                            <h4 class="text-uppercase">Etiquetas</h4>
                                            <a href="javascript::" data-toggle="modal" data-target="#modal-register-tag" class="ml-auto btn btn-success waves-effect waves-light"><i class="mdi mdi-basket mr-1"></i> Inserir Etiqueta</a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table dt-responsive nowrap mb-0">
                                                <tbody>
                                                    @foreach($productTags as $productTag)
                                                    <tr>
                                                        <td>
                                                            <div class="row">
                                                                <img height="17px" class="mr-2" src=" {{ asset('storage/admin/uploads/fotos') }}/{{ $productTag->path_image }} " alt="{{ $productTag->title }}">
                                                                {{ $productTag->title }}
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <form class="action-icon" action="{{ route('admin.productTag.destroy',['productTag' => $productTag->id]) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>{{-- end table-responsive --}}
                                    </div>{{-- end productTag --}}
                                    <div class="productGallery col-12 col-md-6">
                                        <h4 class="mb-3 bg-light p-2 pt-3 mt-0 pb-3 text-uppercase">Galeria de Imagens</h4>
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
                                </div><!-- end row -->
                            </form>

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


@endsection
