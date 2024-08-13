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
                                    <li class="breadcrumb-item active">Usuário</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Usuário</h4>
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
                                            <a href="{{ route('admin.user.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                            <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table id="basic-datatable" data-page-length='50' class="table table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">#</th>
                                            <th>Usuário</th>
                                            <th width="60px" class="text-center">E-mail</th>
                                            <th width="60px" class="text-center">active</th>
                                            <th width="110px" class="text-center">Última modificação</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $user->id }}</b>
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <b>{{ $user->email }}</b>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{route('admin.user.ajax',['user' => $user->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="hidden" name="field" value="active">
                                                                <input type="checkbox" class="checkbox-ajax custom-control-input" @if($user->active==1) checked @endif name="active" id="active_{{$user->id}}">
                                                                <label class="custom-control-label" for="active_{{$user->id}}">&nbsp;</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <b>{{ $user->updated_at ? $user->updated_at->format('d/m/Y H:m:s') : '' }}</b>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.user.edit',['user' => $user->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{  route('admin.user.destroy',['user' => $user->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" style="border: none; background: transparent;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
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
