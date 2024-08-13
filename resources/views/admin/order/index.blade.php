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
                                <li class="breadcrumb-item active">Pedidos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Pedidos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap table-centered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">Nº Pedido</th>
                                            <th class="text-center">Referência</th>
                                            <th class="text-center">Cliente</th>
                                            <th class="text-center">Data</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Status Pedido</th>
                                            <th class="text-center">Autorização</th>
                                            <th class="text-center" style="width: 100px;">Tipo Frete</th>
                                            <th class="text-center" style="width: 100px;">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-center"><a href="javascript: void(0);" class="text-body font-weight-bold">#OS{{ str_pad($order->id, 4, "0", STR_PAD_LEFT) }}</a> </td>
                                                <td class="text-center"><a href="javascript: void(0);" class="text-body font-weight-bold">{{$order->order_integration_id}}</a> </td>
                                                <td class="text-center">
                                                    {{$order->name}}
                                                </td>
                                                <td class="text-center">
                                                    {{ date('d/m/Y', strtotime($order->created_at)) }} <small class="text-muted">{{ date('H:i', strtotime($order->created_at)) }}</small>
                                                </td>
                                                <td class="text-center">
                                                    <b class="text-primary">R$ {{  str_replace('.', ',', $order->amount)  }}</b>
                                                </td>
                                                <td class="text-center">
                                                    <h5>
                                                        @switch($order->status)
                                                            @case(0)
                                                                <span class="badge badge-secondary">Aguardando Confirmação</span>
                                                            @break
                                                            @case(1)
                                                                <span class="badge badge-info">Preparando</span>
                                                            @break
                                                            @case(2)
                                                                <span class="badge badge-primary">Enviado</span>
                                                            @break
                                                            @case(3)
                                                                <span class="badge badge-success">Entregue</span>
                                                            @break
                                                            @case(4)
                                                                <span class="badge badge-danger">Devolvido</span>
                                                            @break
                                                            @case(5)
                                                                <span class="badge badge-info">Recebido</span>
                                                            @break
                                                            @case(6)
                                                                <span class="badge badge-danger">Não Autorizado</span>
                                                            @break
                                                        @endswitch
                                                    </h5>
                                                </td>
                                                <td class="text-center">
                                                    @switch($order->autorization)
                                                        @case(1) <span class="badge badge-secondary">Aguardando pagamento</span> @break;
                                                        @case(2) <span class="badge badge-info">Em análise</span> @break;
                                                        @case(3) <span class="badge badge-success">Paga</span> @break;
                                                        @case(4) <span class="badge badge-success">Disponível</span> @break;
                                                        @case(5) <span class="badge badge-primary">Em disputa</span> @break;
                                                        @case(6) <span class="badge badge-info">Devolvida</span> @break;
                                                        @case(7) <span class="badge badge-danger">Cancelada</span> @break;
                                                        @case(8) <span class="badge badge-success">Debitado</span> @break;
                                                        @case(9) <span class="badge badge-primary">Retenção temporária</span> @break;
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    @switch($order->freight_type)
                                                        @case('FG') Grátis @break;
                                                        @case('RL') Loja @break;
                                                        @case('FF') Fixo @break;
                                                        @default {{$order->freight_type}} @break;
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    <div class="flex">
                                                        <a href="{{ route('admin.order.edit', ['order' => $order->id]) }}" class="action-icon" title="Detalhes do Pedido"> <i class="mdi mdi-eye"></i></a>
                                                        <a href="{{ route('admin.order.show', ['order' => $order->id]) }}" target="_blank" class="action-icon" title="Gerar PDF"> <i class=" mdi mdi-file-pdf-box"></i></a>
                                                        <form class="action-icon" action="{{  route('admin.order.destroy',['order' => $order->id])}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" style="border: none;background-color: transparent;cursor: pointer;" class="action-icon delete_btn"><i class="mdi mdi-delete"></i></button>
                                                        </form>
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
