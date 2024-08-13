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
                                <li class="breadcrumb-item active">Informações de Contatos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Informações de Contatos</h4>
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
                                        @if ($contacts->count() == 0)
                                            <a href="{{ route('admin.contact.create') }}" class="btn btn-success waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-basket mr-1"></i> Cadastrar novo</a>
                                        @endif
                                        <!-- <button type="button" class="btn btn-light waves-effect mb-2">Export</button> -->
                                    </div>
                                </div><!-- end col-->
                            </div>

                            <div class="table-responsive">
                                <table id="basic-datatable" data-page-length='50' class="dt-responsive nowrap table table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="100px" class="text-center">COD.</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>E-mail form</th>
                                            <th>Whatsapp</th>
                                            <th>Política de Troca</th>
                                            <th width="110px" class="text-center">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                        <tr>
                                            <td class="text-center">
                                                <b>{{ $contact->id }}</b>
                                            </td>
                                            <td>
                                                {{ $contact->phone }}
                                            </td>
                                            <td>
                                                {{ $contact->email }}
                                            </td>
                                            <td>
                                                {{ $contact->email_form }}
                                            </td>
                                            <td>
                                                {{ $contact->whatsapp }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('storage/admin/uploads/archive') }}/{{ $contact->path_archive }}" target="_blank"><i class="mdi mdi-cloud-download mdi-24px"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.contact.edit',['contact' => $contact->id]) }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                <form class="action-icon" action="{{ route('admin.contact.destroy',['contact' => $contact->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="action-icon delete_btn" style="border: none; background-color: transparent;"><i class="mdi mdi-delete"></i></button>
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
