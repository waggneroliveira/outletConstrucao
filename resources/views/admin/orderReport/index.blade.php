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
                                <li class="breadcrumb-item active">Relatório de pedidos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Relatório de pedidos</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="pl-3 mr-auto">
                                    <p class="mb-1">Resultado Total: <b>{{$orders->count()}}</b></p>
                                    <p class="mb-1" style="color: #ff6c00;">Valor Total: <b>R$ {{number_format($orders->sum('amount'),2,',','.')}}</b></p>
                                </div>

                                <form action="{{route('admin.orderReport.search')}}" method="post">
                                    @csrf
                                    <div class="row  align-items-center">
                                        <div class="form-group col-3 mb-3">
                                            <label for="statusOrder">Status Pedido</label>
                                            <select class="form-control text-primary  font-weight-bold"  name="status" id="statusOrder">
                                                <option value="" selected="">-</option>
                                                <option value="0" {{$request->status=='0'?'selected':''}}>Aguardando Confirmação</option>
                                                <option value="1" {{$request->status=='1'?'selected':''}}>Preparando</option>
                                                <option value="2" {{$request->status=='2'?'selected':''}}>Enviado</option>
                                                <option value="3" {{$request->status=='3'?'selected':''}}>Entregue</option>
                                                <option value="4" {{$request->status=='4'?'selected':''}}>Devolvido</option>
                                                <option value="5" {{$request->status=='5'?'selected':''}}>Recebido</option>
                                                <option value="6" {{$request->status=='6'?'selected':''}}>Não Autorizado</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3 mb-3">
                                            <label for="autorization">Status Pagamento</label>
                                            <select class="form-control text-primary  font-weight-bold" name="autorization" id="autorization">
                                                <option value="" selected="">-</option>
                                                <option value="1" {{$request->autorization=='1'?'selected':''}}>Aguardando pagamento</option>
                                                <option value="2" {{$request->autorization=='2'?'selected':''}}>Em análise</option>
                                                <option value="3" {{$request->autorization=='3'?'selected':''}}>Paga</option>
                                                <option value="4" {{$request->autorization=='4'?'selected':''}}>Disponível</option>
                                                <option value="5" {{$request->autorization=='5'?'selected':''}}>Em disputa</option>
                                                <option value="6" {{$request->autorization=='6'?'selected':''}}>Devolvida</option>
                                                <option value="7" {{$request->autorization=='7'?'selected':''}}>Cancelada</option>
                                                <option value="8" {{$request->autorization=='8'?'selected':''}}>Debitado</option>
                                                <option value="9" {{$request->autorization=='9'?'selected':''}}>Retenção temporária</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-2 mb-3">
                                            <label for="month">Mês</label>
                                            <select class="form-control text-primary  font-weight-bold" name="month" id="month">
                                                <option value=""selected="">-</option>
                                                <option value="1" {{$request->month=='1'?'selected':''}}>Janeiro</option>
                                                <option value="2" {{$request->month=='2'?'selected':''}}>Fevereiro</option>
                                                <option value="3" {{$request->month=='3'?'selected':''}}>Março</option>
                                                <option value="4" {{$request->month=='4'?'selected':''}}>Abril</option>
                                                <option value="5" {{$request->month=='5'?'selected':''}}>Maio</option>
                                                <option value="6" {{$request->month=='6'?'selected':''}}>Junho</option>
                                                <option value="7" {{$request->month=='7'?'selected':''}}>Julho</option>
                                                <option value="8" {{$request->month=='8'?'selected':''}}>Agosto</option>
                                                <option value="9" {{$request->month=='9'?'selected':''}}>Setembro</option>
                                                <option value="10" {{$request->month=='10'?'selected':''}}>Outubro</option>
                                                <option value="11" {{$request->month=='11'?'selected':''}}>Novembro</option>
                                                <option value="12" {{$request->month=='12'?'selected':''}}>Dezembro</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-2 mb-3">
                                            <label for="year">Ano</label>
                                            <input type="text" data-mask="0000" id="year" name="year" value="{{$request->year}}" class="form-control text-primary font-weight-bold">
                                        </div>
                                        <div class="form-group col-2 mt-2">
                                            <button type="submit" class="btn btn-success ml-auto ml-2">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="single-datatable" class="table table-striped dt-responsive nowrap table-centered mb-0">
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
