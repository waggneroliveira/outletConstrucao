<?php

namespace App\Http\Controllers;

use App\SizeChart;
use App\NotificationPush;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SizeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.SizeChart.index',[
            'sizeCharts' => SizeChart::all(),
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.SizeChart.create',[
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImageMenu = $nameSlug.'.'.$extension;
        }

        $sizeChart = new SizeChart();
        $sizeChart->path_image = $newNameImageMenu;
        if($sizeChart->save()){
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImageMenu);
            }

            Session::flash('success','Tabela cadastrada com sucesso');
            return redirect()->route('admin.sizeChart.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function show(SizeChart $sizeChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeChart $sizeChart)
    {
        $notifications = NotificationPush::orderBy('created_at', 'DESC')->limit(10)->get();
        $notificationQuantity = NotificationPush::where('status', 0)->count();
        return view('admin.SizeChart.create',[
            'sizeChart' => $sizeChart,
            'notifications' => $notifications,
            'notificationQuantity' => $notificationQuantity
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SizeChart $sizeChart)
    {
        if($request->hasFile('path_image')){
            $clientOriginalName = $request->file('path_image')->getClientOriginalName();
            $nameImage = explode('.', $clientOriginalName)[0];
            $nameSlug = Str::of($nameImage)->slug().'-'.time();
            $extension = $request->file('path_image')->extension();

            $newNameImageMenu = $nameSlug.'.'.$extension;
        }

        $sizeChart->path_image = $newNameImageMenu;
        if($sizeChart->save()){
            if($request->hasFile('path_image')){
                $request->file('path_image')->storeAs('admin/uploads/fotos', $newNameImageMenu);
            }

            Session::flash('success','Tabela alterada com sucesso');
            return redirect()->route('admin.sizeChart.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SizeChart  $sizeChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeChart $sizeChart)
    {
        //
    }
}
