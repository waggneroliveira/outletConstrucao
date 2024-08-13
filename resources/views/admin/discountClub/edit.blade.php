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
                                <li class="breadcrumb-item"><a href="{{ route('admin.discountClub.index') }}">Clube de Desconto</a></li>
                                <li class="breadcrumb-item active">Editar Club de descontos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Club de descontos</h4>
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
                                        <button type="button" onclick="submitForm('#formCategoria')" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Salvar</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <form id="formCategoria" action="{{ route('admin.discountClub.update', ['discountClub' => $discountClub->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-6">
                                                <label for="simpleinput">Titulo</label>
                                                <input type="text" id="simpleinput" name="title" value="{{ $discountClub->title }}" class="form-control">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label for="simpleinput">Subtitulo</label>
                                                <input type="text" id="simpleinput" name="subtitle" value="{{ $discountClub->subtitle }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="description">Descrição</label>
                                            <textarea id="description" name="description" rows="10" class="form-control" required>{{$discountClub->description}}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3 col-12 col-md-6">
                                                <div class="custom-control custom-checkbox form-check">
                                                    <input type="checkbox" @if($discountClub->active==1) checked @endif  name="active" class="custom-control-input" id="active" value="1">
                                                    <label class="custom-control-label" for="active">Ativa?</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
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

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right"></div>
                        <h4 class="page-title">Como Funciona</h4>
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
                                        <a href="javascript::" data-toggle="modal" data-target="#modal-register-howWorks" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
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
                                            <th width="60px" class="text-center">Icone</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($howWorks as $howWork)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $howWork->id }}</b>
                                                </td>
                                                <td>{{ $howWork->title }}</td>
                                                <td class="text-center">
                                                    <div class="rounded-circle ml-auto mr-auto"
                                                        style="
                                                            width: 40px;
                                                            height: 40px;
                                                            background: url({{ url('storage/admin/uploads/fotos') }}/{{ $howWork->path_image }}) no-repeat center #e8e8e8;
                                                            background-size: cover;
                                                            border: 1px solid #ccc;">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript::" data-toggle="modal" data-target="#modal-edit-howWorks{{$howWork->id}}"  class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{ route('admin.howWorks.destroy',['howWorks' => $howWork->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="action-icon delete_btn" style="border: navajowhite;background: transparent;"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                    <!-- <a href="" class=" action-icon"> <i class="mdi mdi-delete"></i></a> -->
                                                    <div class="modal fade show" id="modal-edit-howWorks{{$howWork->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0 d-block">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title">Cadastro de Como Funciona</h4>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form  class="needs-validation" novalidate id="form-register-opcao{{$howWork->id}}" method="post" action=" {{ route('admin.howWorks.update',['howWorks' => $howWork->id]) }} " enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="amount">Title</label>
                                                                            <input type="text" id="amount" name="title" class="form-control" value="{{$howWork->title}}">
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <label for="path_image">Icone</label>
                                                                            <input type="file" class="dropify" name="path_image" data-default-file="{{asset('storage/admin/uploads/fotos')}}/{{ $howWork->path_image}}" data-height="200" />
                                                                        </div><!-- end col -->
                                                                    </form>

                                                                    <div class="text-right mt-3">
                                                                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" onclick="submitForm('#form-register-opcao{{$howWork->id}}')" class="btn btn-primary ml-1 save-category">Salvar</button>
                                                                    </div>

                                                                </div> <!-- end modal-body-->
                                                            </div> <!-- end modal-content-->
                                                        </div> <!-- end modal dialog-->
                                                    </div>
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

    <div class="modal fade show" id="modal-register-howWorks" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cadastro de Como Funciona</h4>
                </div>
                <div class="modal-body p-4">
                    <form  class="needs-validation" novalidate id="form-register-opcao" method="post" action=" {{ route('admin.howWorks.store') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="amount">Title</label>
                            <input type="text" id="amount" name="title" class="form-control">
                        </div>
                        <div class="col-12 mt-3">
                            <label for="path_image">Icone</label>
                            <input type="file" class="dropify" name="path_image" data-height="200" />
                        </div><!-- end col -->
                    </form>

                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="submitForm('#form-register-opcao')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right"></div>
                        <h4 class="page-title">Vantagens</h4>
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
                                        <a href="javascript::" data-toggle="modal" data-target="#modal-register-advantages" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
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
                                            <th>Descrição</th>
                                            <th width="60px" class="text-center">Icone</th>
                                            <th width="110px" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advantages as $advantage)
                                            <tr>
                                                <td class="text-center">
                                                    <b>{{ $advantage->id }}</b>
                                                </td>
                                                <td>{{ $advantage->title }}</td>
                                                <td>{{ $advantage->description }}</td>
                                                <td class="text-center">
                                                    <div class="rounded-circle ml-auto mr-auto"
                                                        style="
                                                            width: 40px;
                                                            height: 40px;
                                                            background: url({{ url('storage/admin/uploads/fotos') }}/{{ $advantage->path_image }}) no-repeat center #e8e8e8;
                                                            background-size: cover;
                                                            border: 1px solid #ccc;">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <a href="javascript::" data-toggle="modal" data-target="#modal-edit-advantages{{$advantage->id}}"  class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    <form class="action-icon" action="{{ route('admin.advantages.destroy',['advantages' => $advantage->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="action-icon delete_btn" style="border: navajowhite;background: transparent;"><i class="mdi mdi-delete"></i></button>
                                                    </form>
                                                    <!-- <a href="" class=" action-icon"> <i class="mdi mdi-delete"></i></a> -->
                                                    <div class="modal fade show" id="modal-edit-advantages{{$advantage->id}}" tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-bottom-0 d-block">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                    <h4 class="modal-title">Editar Vantagem</h4>
                                                                </div>
                                                                <div class="modal-body p-4">
                                                                    <form  class="needs-validation" novalidate id="form-register-opcao-advantages{{$advantage->id}}" method="post" action=" {{ route('admin.advantages.update',['advantages' => $advantage->id]) }} " enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-group mb-3 text-left">
                                                                            <label for="amount">Title</label>
                                                                            <input type="text" id="amount" name="title" class="form-control" value="{{$advantage->title}}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="description">Descrição</label>
                                                                            <textarea id="description" name="description" rows="5" class="form-control">{{$advantage->description}}</textarea>
                                                                        </div>
                                                                        <div class="col-12 mt-3">
                                                                            <label for="path_image">Icone</label>
                                                                            <input type="file" class="dropify" name="path_image" data-default-file="{{asset('storage/admin/uploads/fotos')}}/{{ $advantage->path_image}}" data-height="200" />
                                                                        </div><!-- end col -->
                                                                    </form>

                                                                    <div class="text-right mt-3">
                                                                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" onclick="submitForm('#form-register-opcao-advantages{{$advantage->id}}')" class="btn btn-primary ml-1 save-category">Salvar</button>
                                                                    </div>

                                                                </div> <!-- end modal-body-->
                                                            </div> <!-- end modal-content-->
                                                        </div> <!-- end modal dialog-->
                                                    </div>
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

    <div class="modal fade show" id="modal-register-advantages" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 d-block">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cadastro de Vantagens</h4>
                </div>
                <div class="modal-body p-4">
                    <form  class="needs-validation" novalidate id="form-register-opcao-advantage" method="post" action=" {{ route('admin.advantages.store') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="amount">Title</label>
                            <input type="text" id="amount" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Descrição</label>
                            <textarea id="description" name="description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-12 mt-3">
                            <label for="path_image">Icone</label>
                            <input type="file" class="dropify" name="path_image" data-height="200" />
                        </div><!-- end col -->
                    </form>

                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="submitForm('#form-register-opcao-advantage')" class="btn btn-primary ml-1 save-category">Cadastrar</button>
                    </div>

                </div> <!-- end modal-body-->
            </div> <!-- end modal-content-->
        </div> <!-- end modal dialog-->
    </div>


@endsection
