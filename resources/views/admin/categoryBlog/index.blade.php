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
                                <li class="breadcrumb-item active">Categorias Blog</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Categorias Blog</h4>
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
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-right">
                                        <a href="{{ route('admin.categoryBlog.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Title</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td class="text-center"><b>{{ $category->id }}</b></td>
                                            <td>{{ $category->title }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($category->active==1) checked @endif class="custom-control-input" id="checkActived{{ $category->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $category->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.categoryBlog.edit',['categoryBlog' => $category->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.categoryBlog.destroy',['categoryBlog' => $category->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="action-icon delete_btn" style="border: navajowhite;background: transparent;"><i class="mdi mdi-delete"></i></button>
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



@endsection
