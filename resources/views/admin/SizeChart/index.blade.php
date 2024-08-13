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
                                <li class="breadcrumb-item active">Tabela de tamanhos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Tabela de tamanhos</h4>
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
                                        @if ($sizeCharts->count() == 0)
                                            <a href="{{ route('admin.sizeChart.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        @endif
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th width="60px" class="text-center">Tabela</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sizeCharts as $sizeChart)
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $sizeChart->id }}</b>
                                            </td>
                                            <td class="text-center">
                                                <div class="rounded-circle ml-auto mr-auto"
                                                    style="
                                                        width: 40px;
                                                        height: 40px;
                                                        background: url({{ url('storage/admin/uploads/fotos') }}/{{ $sizeChart->path_image }}) no-repeat center #e8e8e8;
                                                        background-size: cover;
                                                        border: 1px solid #ccc;">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.sizeChart.edit',['sizeChart' => $sizeChart->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.sizeChart.destroy',['sizeChart' => $sizeChart->id]) }}" method="post">
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
