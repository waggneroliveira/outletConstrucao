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
                                    <li class="breadcrumb-item active">Cupom</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cupom</h4>
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
                                            <a href="{{ route('admin.coupon.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                            <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">#</th>
                                            <th>Cupom</th>
                                            <th width="180px" class="text-center">Desconto</th>
                                            <th width="180px" class="text-center">Limite de uso</th>
                                            <th width="60px" class="text-center">Porcentagem</th>
                                            <th width="60px" class="text-center">Primeiro uso</th>
                                            <th width="60px" class="text-center">Ativo</th>
                                            <th width="200px" class="text-center">Última modificação</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coupons as $coupon)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $coupon->id }}</b>
                                                </td>
                                                <td>
                                                    {{ $coupon->coupon }}
                                                </td>
                                                <td class="text-center">
                                                    <b>{{ $coupon->amount }}</b>
                                                </td>
                                                <td class="text-center">
                                                    <b>{{ $coupon->use_limit}}</b>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                       <form action="{{route('admin.coupon.ajax',['coupon' => $coupon->id])}}" method="POST">
                                                           @csrf
                                                           @method('PUT')
                                                           <div class="custom-control custom-checkbox">
                                                               <input type="hidden" name="field" value="percentage">
                                                               <input type="checkbox" class="checkbox-ajax custom-control-input" @if($coupon->percentage==1) checked @endif name="percentage" id="percentage">
                                                               <label class="custom-control-label" for="percentage">&nbsp;</label>
                                                           </div>
                                                       </form>

                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                       <form action="{{route('admin.coupon.ajax',['coupon' => $coupon->id])}}" method="POST">
                                                           @csrf
                                                           @method('PUT')
                                                           <div class="custom-control custom-checkbox">
                                                               <input type="hidden" name="field" value="first_order_only">
                                                               <input type="checkbox" class="checkbox-ajax custom-control-input" @if($coupon->first_order_only==1) checked @endif name="first_order_only" id="first_order_only">
                                                               <label class="custom-control-label" for="first_order_only">&nbsp;</label>
                                                           </div>
                                                       </form>

                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{route('admin.coupon.ajax',['coupon' => $coupon->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="hidden" name="field" value="active">
                                                                <input type="checkbox" class="checkbox-ajax custom-control-input" @if($coupon->active==1) checked @endif name="active" id="active">
                                                                <label class="custom-control-label" for="active">&nbsp;</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    {{ $coupon->updated_at->format('d/m/Y') }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.coupon.edit',['coupon' => $coupon->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{  route('admin.coupon.destroy',['coupon' => $coupon->id])}}" method="post">
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
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- content -->



@endsection
