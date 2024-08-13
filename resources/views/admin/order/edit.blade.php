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
                                <li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Pedidos</a></li>
                                <li class="breadcrumb-item active">Pedido <b>#OS{{ str_pad($order->orderId, 4, "0", STR_PAD_LEFT) }}</b></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Detalhes do Pedido</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <a href="javascript::" id="btnPrint" onclick="submitForm('#formCategoria')" class="btn btn-success ml-auto mb-2 mr-2">Salvar</a>
                <a href="{{ route('admin.order.show', ['order' => $order->orderId]) }}" id="btnPrint" target="_blank"  class="btn btn-secondary mb-2 mr-2">Imprimir Fatura</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="formCategoria" action="{{ route('admin.order.update', ['order' => $order->orderId]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="example-select">Status do Pedido <i style="font-size: 12px;">(Status para acompanhamento do cliente)</i></label>
                                            <select class="form-control text-primary  font-weight-bold" name="status" required id="ChangeStatusOrder">
                                                <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Aguardando Confirmação</option>
                                                <option value="5" {{ $order->status == 5 ? 'selected' : '' }}>Recebido</option>
                                                <option value="1"{{ $order->status == 1 ? 'selected' : '' }}>Preparando</option>
                                                <option value="2"{{ $order->status == 2 ? 'selected' : '' }}>Enviado</option>
                                                <option value="3"{{ $order->status == 3 ? 'selected' : '' }}>Entregue</option>
                                                <option value="4"{{ $order->status == 4 ? 'selected' : '' }}>Devolvido</option>
                                                <option value="6"{{ $order->status == 6 ? 'selected' : '' }}>Não Autorizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            @php
                                                switch ($order->autorization) {
                                                    case 1: $bgColor = "bg-secondary"; break;
                                                    case 2: $bgColor = "bg-primary"; break;
                                                    case 3: $bgColor = "bg-success"; break;
                                                    case 4: $bgColor = "bg-success"; break;
                                                    case 5: $bgColor = "bg-primary"; break;
                                                    case 6: $bgColor = "bg-danger"; break;
                                                    case 7: $bgColor = "bg-danger"; break;
                                                    case 8: $bgColor = "bg-success"; break;
                                                }
                                            @endphp
                                            <label for="example-select">Status do Pagamento</label>
                                            <select class="form-control text-white font-weight-bold {{$bgColor}}" name="autorization" required id="ChangeStatusOrder">
                                                <option value="1" {{ $order->autorization == 1 ? 'selected' : '' }}>Aguardando pagamento</option>
                                                <option value="2" {{ $order->autorization == 2 ? 'selected' : '' }}>Em análise</option>
                                                <option value="3"{{ $order->autorization == 3 ? 'selected' : '' }}>Paga</option>
                                                <option value="4"{{ $order->autorization == 4 ? 'selected' : '' }}>Disponível</option>
                                                <option value="5"{{ $order->autorization == 5 ? 'selected' : '' }}>Em disputa</option>
                                                <option value="6"{{ $order->autorization == 6 ? 'selected' : '' }}>Devolvida</option>
                                                <option value="7"{{ $order->autorization == 7 ? 'selected' : '' }}>Cancelada</option>
                                                <option value="8"{{ $order->autorization == 8 ? 'selected' : '' }}>Debitada</option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Código de Rastreio</label>
                                            <input type="text" id="simpleinput" value="{{$order->restriction_code}}" name="restriction_code" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Data</label>
                                            <input type="text" id="simpleinput" disabled value="{{ date('d/m/Y H:i', strtotime($order->order_created)) }}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Cliente</label>
                                            <input type="text" id="simpleinput" disabled value="{{ $order->name }}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">CPF</label>
                                            <input type="text" id="simpleinput" disabled value="{{ $order->cpf }}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">E-mail</label>
                                            <input type="text" id="simpleinput" disabled value="{{ $order->email }}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Telefone</label>
                                            <input type="text" id="simpleinput" data-mask="#######-0000" data-mask-reverse="true" disabled value="{{ $order->phone }}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Endereço entrega</label>
                                            {{-- <input type="text" id="simpleinput" disabled value="{{ $order->public_place }} - Cep: {{ $order->zip_code }}, {{ $order->city }} - {{ $order->region }}" class="form-control"> --}}
                                            <textarea id="simpleinput" rows="6" disabled class="form-control">{{ $order->public_place }} - Cep: {{ $order->zip_code }}, {{ $order->city }} - {{ $order->region }} - {{ $order->complement }} - {{ $order->reference }}</textarea>
                                        </div>
                                    </div><!-- end col -->
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Pedido Nº</label>
                                            <input type="text" id="simpleinput" disabled value="#OS{{ str_pad($order->orderId, 4, "0", STR_PAD_LEFT) }}" class="form-control text-primary  font-weight-bold">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Referência</label>
                                            <input type="text" id="simpleinput" disabled value="{{$order->order_integration_id}}" class="form-control text-primary  font-weight-bold">
                                        </div>

                                        <h4 class="mb-3 bg-light p-2 pt-1 mt-2 pb-1">Informações de Pagamento</h4>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Tipo de pagamento</label>
                                            @php
                                               switch($order->payment_method){
                                                    case 1: $paymentMethod =  "Cartão de Crédito"; break;
                                                    case 2: $paymentMethod =  "Boleto"; break;
                                                    case 3: $paymentMethod =  "Débito online"; break;
                                                    case 4: $paymentMethod =  "Saldo PagSeguro"; break;
                                               }
                                            @endphp
                                            <input type="text" id="simpleinput" disabled value="{{$paymentMethod}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Tipo Frete</label>
                                            @php
                                                switch ($order->freight_type) {
                                                    case 'FG': $freight_type = "Grátis"; break;
                                                    case 'RL': $freight_type = "Loja"; break;
                                                    case 'FF': $freight_type = "Fixo"; break;
                                                    default: $freight_type = $order->freight_type; break;
                                                }
                                            @endphp
                                            <input type="text" id="simpleinput" disabled value="{{$freight_type}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="example-select">Cupom</label>
                                            <input type="text" id="simpleinput" disabled value="{{$order->coupon}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Frete</label>
                                            <input type="text" id="simpleinput" disabled value="R$ {{  number_format($order->freight,2,',','.')  }}" class="form-control text-danger font-weight-bold">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Total do pedido</label>
                                            <input type="text" id="simpleinput" disabled value="R$ {{  number_format($order->amount,2,',','.')  }}" class="form-control text-danger font-weight-bold">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Bandeira</label>
                                            <input type="text" id="simpleinput" disabled value="{{ $card->brand==1?'-':$card->brand}}" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="simpleinput">Parcelas</label>
                                            <input type="text" id="simpleinput" disabled value="{{ $card->parcel==0?'-':$card->parcel.'x' }}" class="form-control">
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <h4 class="mb-3 btn-primary p-2">Itens do pedido</h4>
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Ref.</th>
                                            <th class="text-center">Qtd.</th>
                                            <th class="text-center">Valor</th>
                                            <th width="120" class="text-center">Tamanho</th>
                                            <th width="150" class="text-center">Cor</th>
                                            <th width="150" class="text-center">Estampa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td class="table-user"><a href="{{route('site.product.productContent', ['product' => $item->product_id])}}" target="_blank" rel="noopener noreferrer" class="text-primary"><b>{{ $item->title }}</b></a></td>
                                            <td class="table-user">{{ $item->reference_code }}</td>
                                            <td class="text-center">{{ $item->quantity }}</td>
                                            <td class="text-center">R$ {{ number_format($item->amount,2,',','.') }}</td>
                                            <td class="text-center">{{$item->size}}</td>
                                            <td class="text-center">
                                                <div class="row" style="align-items: center; justify-content: center;">
                                                    <i class="avatar-xs rounded-circle d-block mr-2" style="background-color: {{$item->color}}"></i>
                                                    {{$item->color}}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="row" style="align-items: center; justify-content: center;">
                                                    <i class="avatar-xs rounded-circle d-block mr-2" style="background: url({{asset('storage/admin/uploads/fotos')}}/{{$item->attachment_image}}) center no-repeat; background-size: cover;"></i>
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



@endsection
