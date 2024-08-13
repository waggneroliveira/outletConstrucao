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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Usuário</a></li>
                                    <li class="breadcrumb-item active">Cadastro Usuário</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Editar Usuário</h4>
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
                                            <button type="button" onclick="submitForm('#formUser')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <form id="formUser" action="{{ route('admin.user.update',['user'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="user">Nome</label>
                                                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="email">E-mail</label>
                                                    <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="password">Senha</label>
                                                    <input type="password" id="password" name="password" value="" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="password_confirmation">Confirmação Senha</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="active">Ativo?</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" @if($user->active) checked @endif name="active" id="active">
                                                        <label class="custom-control-label" for="active">&nbsp;</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
