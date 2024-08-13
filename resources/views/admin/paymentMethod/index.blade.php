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
                                <li class="breadcrumb-item active">Metodos de Pagamento</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Metodos de Pagamento</h4>
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
                                        <a href="{{ route('admin.paymentMethod.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="table dt-responsive nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Bandeira</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="60px" class="text-center">Imagem</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paymentMethods as $paymentMethod)
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $paymentMethod->id }}</b>
                                            </td>
                                            <td>
                                            {{ $paymentMethod->flag }}
                                            </td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($paymentMethod->active==1) checked @endif class="custom-control-input" id="checkActived{{ $paymentMethod->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $paymentMethod->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-circle ml-auto mr-auto"
                                                    style="
                                                        width: 40px;
                                                        height: 40px;
                                                        background: url({{ url('storage/admin/uploads/fotos') }}/{{ $paymentMethod->path_image }}) no-repeat center;
                                                        background-size: cover;
                                                        border: 1px solid #ccc;">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.paymentMethod.edit',['paymentMethod' => $paymentMethod->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.paymentMethod.destroy',['paymentMethod' => $paymentMethod->id]) }}" method="post">
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
