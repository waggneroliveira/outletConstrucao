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
                                <li class="breadcrumb-item active">Clube de Descontos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Clube de Descontos</h4>
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
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Title</th>
                                            <th>Subtítulo</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $discountClub->id }}</b>
                                            </td>
                                            <td>{{ $discountClub->title }}</td>
                                            <td>{{ $discountClub->subtitle }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($discountClub->active==1) checked @endif class="custom-control-input" id="checkActived{{ $discountClub->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $discountClub->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.discountClub.edit',['discountClub' => $discountClub->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <!-- <a href="" class=" action-icon"> <i class="mdi mdi-delete"></i></a> -->
                                            </td>
                                        </tr>
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
