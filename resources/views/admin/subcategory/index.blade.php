@extends('admin.layouts.app')
@section('content')
>
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
                                <li class="breadcrumb-item active">Listagem de Subategoria</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Listagem de Subategoria</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-4 ml-auto">
                                    <div class="text-lg-right">
                                        <a href="{{ route('admin.subcategory.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="80px" class="text-center">COD.</th>
                                            <th>Title</th>
                                            <th>Categoria</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subcategories as $subcategory)
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $subcategory->id }}</b>
                                            </td>
                                            <td>
                                            {{ $subcategory->title }}
                                            </td>
                                            <th>{{ $subcategory->category_title }}</th>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($subcategory->active == 1) checked @endif class="custom-control-input" id="checkActived{{ $subcategory->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $subcategory->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.subcategory.edit',['subcategory' => $subcategory->slug]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.subcategory.destroy',['subcategory' => $subcategory->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" style="border: none;background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                </form>
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


<!-- ============================================================== -->

@endsection
