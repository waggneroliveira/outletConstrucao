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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">Cupom</a></li>
                                    <li class="breadcrumb-item active">Cadastro Cupom</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cadastro Bairro</h4>
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
                                            <button type="button" onclick="submitForm('#formCoupon')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <form id="formCoupon" action="{{ route('admin.coupon.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="coupon">Cupom</label>
                                                    <input type="text" id="coupon" name="coupon" value="{{old('coupon')}}" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="amount">Valor</label>
                                                    <input type="text" id="amount" value="{{old('amount')}}" name="amount" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="use_limit">Limite de uso</label>
                                                    <input type="text" id="use_limit" value="{{old('use_limit')}}" name="use_limit" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row pl-3">
                                                <div class="form-group col-md-4 row">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" @if(old('percentage')) checked @endif class="custom-control-input" name="percentage" id="percentage">
                                                        <label class="custom-control-label" for="percentage">&nbsp;</label>
                                                    </div>
                                                    <label for="percentage">Desconto por porcentagem?</label>
                                                </div>
                                                <div class="form-group col-md-4 row">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" @if(old('first_order_only')) checked @endif class="custom-control-input" name="first_order_only" id="first_order_only">
                                                        <label class="custom-control-label" for="first_order_only">&nbsp;</label>
                                                    </div>
                                                    <label for="first_order_only">Primeira compra?</label>
                                                </div>
                                                <div class="form-group col-md-4 row">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" @if(old('active')) checked @endif name="active" id="active">
                                                        <label class="custom-control-label" for="active">&nbsp;</label>
                                                    </div>
                                                    <label for="active">Ativo?</label>
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
