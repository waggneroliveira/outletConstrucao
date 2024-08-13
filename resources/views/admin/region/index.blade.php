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
                                    <li class="breadcrumb-item active">Bairro</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Bairro</h4>
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
                                            <a href="{{ route('admin.region.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                            <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-centered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">#</th>
                                            <th width="60px" class="text-center">Cidade</th>
                                            <th>Bairro</th>
                                            <th width="60px" class="text-center">Valor</th>
                                            <th width="60px" class="text-center">Ativo</th>
                                            <th width="110px" class="text-center">Última modificação</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($regions as $region)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $region->id }}</b>
                                                </td>
                                                <td>
                                                    @foreach($cities as $city)
                                                        @if($city->id == $region->city_id)
                                                            {{ $city->city }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $region->region }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <b>R$ {{ str_replace('.', ',', $region->amount) }}</b>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <form action="{{route('admin.region.ajax',['region' => $region->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="hidden" name="field" value="active">
                                                                <input type="checkbox" class="checkbox-ajax custom-control-input" @if($region->active==1) checked @endif name="active" id="active_{{$region->id}}">
                                                                <label class="custom-control-label" for="active_{{$region->id}}">&nbsp;</label>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <b>{{ $region->updated_at->format('d/m/Y H:m:s') }}</b>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.region.edit',['region' => $region->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{  route('admin.region.destroy',['region' => $region->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="bg-white border-0 action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
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
