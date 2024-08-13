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
                                <li class="breadcrumb-item active">Listagem de Links</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Links do Rodapé</h4>
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
                                        <a href="{{ route('admin.footerLink.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Titulo Link</th>
                                            <th>Titulo Popup</th>
                                            <th width="60px" class="text-center">Ativo?</th>
                                            <th width="60px" class="text-center">Arquivo</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($footerLinks as $footerLink)
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $footerLink->id }}</b>
                                            </td>
                                            <td>{{ $footerLink->title_link }}</td>
                                            <td>{{ $footerLink->title_modal }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" @if($footerLink->active==1) checked @endif class="custom-control-input" id="checkActived{{ $footerLink->id }}">
                                                    <label class="custom-control-label" for="checkActived{{ $footerLink->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if ($footerLink->path_archive <> '')
                                                    <a href="{{asset('storage/admin/uploads/archive/'.$footerLink->path_archive)}}" target="_blank" class="mdi mdi-cloud-download mdi-24px mr-1"></a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.footerLink.edit',['footerLink' => $footerLink->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.footerLink.destroy',['footerLink' => $footerLink->id]) }}" method="post">
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
