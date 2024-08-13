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
                                <li class="breadcrumb-item active">Listagem de Marcas</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Listagem de Marcas</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-8">
                                    <form class="form-inline">
                                        <div class="form-group mb-2">
                                            <label for="inputPassword2" class="mr-2">Nome</label>
                                            <input type="search" class="form-control" id="inputPassword2">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-right">
                                        <a href="{{ route('admin.brand.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Nome</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="60px" class="text-center">Imagem</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($brands as $brand)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll{{ $brand->id }}">
                                                    <label class="custom-control-label" for="checkAll{{ $brand->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center"><b>{{ $brand->id }}</b></td>
                                            <td>{{ $brand->name }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($brand->active==1) checked @endif class="custom-control-input" id="checkActived{{ $brand->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $brand->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-circle ml-auto mr-auto"
                                                    style="
                                                        width: 40px;
                                                        height: 40px;
                                                        background: url({{ url('storage/admin/uploads/fotos') }}/{{ $brand->path_image }}) no-repeat center #e8e8e8;
                                                        background-size: cover;
                                                        border: 1px solid #ccc;">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.brand.edit',['brand' => $brand->slug]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.brand.destroy',['brand' => $brand->slug]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="action-icon delete_btn" style="border: navajowhite;background: transparent;"><i class="mdi mdi-delete"></i></button>
                                                </form>
                                                <!-- <a href="" class=" action-icon"> <i class="mdi mdi-delete"></i></a> -->
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
