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
                                <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Listagem Contatos</a></li>
                                <li class="breadcrumb-item active">Editar Contatos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Editar Contatos</h4>
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

                            <form id="formCategoria" action="{{ route('admin.contact.update', ['contact' => $contact->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Telefone</label>
                                            <input type="text" id="simpleinput" name="phone" placeholder="Esse telefone ficará a mostra no rodapé do site" class="form-control" value=" {{ $contact->phone }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">E-mail</label>
                                            <input type="text" id="simpleinput" name="email" placeholder="Esse email ficará a mostra no rodapé do site" class="form-control" value=" {{ $contact->email }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">E-mail Form</label>
                                            <input type="text" id="simpleinput" placeholder="E-mail para receber os cadastrados de newsletter" name="email_form" class="form-control" value=" {{ $contact->email_form }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="address">Endereços</label>
                                            <textarea class="form-control" name="address" id="address" rows="5">{{ $contact->address }} </textarea>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="whatsapp">Whatsapp</label>
                                            <input type="text" id="whatsapp" placeholder="Ex: 71 0000-0000" name="whatsapp" class="form-control" value=" {{ $contact->whatsapp }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="instagram">Instagram</label>
                                            <input type="text" id="instagram" placeholder="Ex: hoominterativa" name="instagram" class="form-control" value=" {{ $contact->instagram }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="youtube">Youtube</label>
                                            <input type="text" id="youtube" placeholder="Ex: UCUN9lhwfMJRxMVuet7Shg0w" name="youtube" class="form-control" value=" {{ $contact->youtube }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" id="twitter" placeholder="Ex: hoominterativa" name="twitter" class="form-control" value=" {{ $contact->twitter }} ">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" id="facebook" placeholder="Ex: hoominterativa" name="facebook" class="form-control" value=" {{ $contact->facebook }} ">
                                        </div>
                                        <div class="col-12 col-md-6 mt-3">
                                            <label for="politicaTroca">Política de Troca</label>
                                            <input type="file" class="dropify" id="politicaTroca" name="path_archive" data-default-file="{{asset('storage/admin/uploads/archive')}}/{{ $contact->path_archive}}" data-height="200" />
                                        </div><!-- end col -->
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
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
