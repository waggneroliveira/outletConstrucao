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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.city.index') }}">Cidade</a></li>
                                    <li class="breadcrumb-item active">Cadastro Cidade</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cadastro Cidade</h4>
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
                                            <button type="button" onclick="submitForm('#formCity')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Atualizar</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <form id="formCity" action="{{ route('admin.city.update',['city' => $city->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="city">Cidade</label>
                                                    <input type="text" id="city" name="city" value="{{$city->city}}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="active">Ativo?</label>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" @if($city->active) checked @endif name="active" id="active">
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
