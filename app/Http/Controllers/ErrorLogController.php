<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorLogController extends Controller
{
    public function LogError(Request $request){

        date_default_timezone_set('America/Bahia');

        $data = date('YmdHis');
        $dataPrint = date('Y-m-d H:i:s');
        $arquivo = fopen('errolog_'.$data.'.txt','w');

        $log = "[[{$dataPrint}] => Mensagem: {$request->mensagem}, Arquivo: {$request->arquivo}, Linha: {$request->linha}]";

        fwrite($arquivo, $log);
        fclose($arquivo);
    }
}
