<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\Customer;
use App\Integration;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        // OS 6 ULTIMOS PEDIDOS REALIZADOS
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('customers.name', 'orders.*')
            ->orderBy('orders.created_at', 'DESC')
            ->limit(10)
            ->get();

        // TOTAL DE VENDAS NO DIA
        $date = date('Y-m-d');
        $ordersToday = Order::whereDate('created_at', '=', $date)
            ->where('status', 3)
            ->get();
            $totalRevenueToday = $ordersToday->sum('amount');
        $todaysSales = count($ordersToday);

        // TOTAL DE PEDIDOS AGUARDANDO
        $ordersWaiting = Order::where('status', 0)->get();
        $waitingTotal = count($ordersWaiting);

        // TOTAL DE VENDAS
        $month = date('m');
        $allOrders = Order::whereMonth('created_at', '=', $month)
            ->where('status', 3)
            ->get();
        $totalRevenue = $allOrders->sum('amount');
        $totalSales = count($allOrders);

        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        $integration = Integration::first();
        $stocks = Stock::where('quantity', '<=', $integration->limit_alert_stock)->get();
        return view('admin.home', [
            'orders' => $orders,
            'totalRevenueToday' => $totalRevenueToday,
            'todaysSales' => $todaysSales,
            'totalRevenue' => $totalRevenue,
            'totalSales' => $totalSales,
            'waitingTotal' => $waitingTotal,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity,
            'stocks' => $stocks
        ]);
    }

    public function excelGenerator(){

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $customers = Customer::all();

        $sheet->setCellValue('A1', 'Nome');
        $sheet->setCellValue('B1', 'E-mail');
        $sheet->setCellValue('C1', 'CPF');
        $sheet->setCellValue('D1', 'Telefone');
        $sheet->setCellValue('E1', 'Ativo');

        $i = 2;

        foreach ($customers as $key => $value){

            $sheet->setCellValue('A'.$i, $value->name);
            $sheet->setCellValue('B'.$i, $value->email);
            $sheet->setCellValue('C'.$i, $value->cpf);
            $sheet->setCellValue('D'.$i, $value->phone);
            $sheet->setCellValue('E'.$i, $value->active == 1 ? 'Sim' : 'Não');

            $i++;
        }

        $sheet->setAutoFilter("A1:E$i");
        $sheet->setShowGridlines("A1:E$i");

        $writer = new Xlsx($spreadsheet);

        $random = rand(1000,9999).'-'.time();
        $path = 'storage/';
        $name = "admin/uploads/temp_files/clientes_{$random}.xlsx";

        $writer->save($path.$name);

        if(!Storage::exists($name)){

            $return['status'] = 'error';
            $return['msg'] = 'Erro ao gerar o arquivo PDF';

        }else{

            $headers = array(
                'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            );

            return response()->download(public_path().'/'.$path.$name,"clientes_{$random}.xlsx",$headers);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
