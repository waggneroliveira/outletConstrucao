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
                                    <li class="breadcrumb-item active">Extra</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Extra</h4>
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
                                                <label for="inputPassword2" class="mr-2">Titulo</label>
                                                <input type="search" class="form-control" id="inputPassword2">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="text-lg-right">
                                            <a href="{{ route('admin.extra.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                            <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">#</th>
                                            <th>Extra</th>
                                            <th width="60px" class="text-center">Ativo</th>
                                            <th width="110px" class="text-center">Última modificação</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($extras as $extra)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $extra->id }}</b>
                                                </td>
                                                <td>
                                                    {{ $extra->extra }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{route('admin.extra.ajax',['extra' => $extra->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="hidden" name="field" value="active">
                                                                <input type="checkbox" class="checkbox-ajax custom-control-input" @if($extra->active==1) checked @endif name="active" id="active">
                                                                <label class="custom-control-label" for="active">&nbsp;</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <b>{{ $extra->updated_at->format('d/m/Y') }}</b>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.extra.edit',['extra' => $extra->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{  route('admin.extra.destroy',['extra' => $extra->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                    <!-- <a href="" class=" action-icon"> <i class="mdi mdi-delete"></i></a> -->
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <ul class="pagination pagination-rounded justify-content-end my-2">
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



@endsection
