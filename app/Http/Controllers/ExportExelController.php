<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExelController extends Controller
{
    public function export()
    {
        return Excel::download(new ProductsExport, 'Produtos Daducha.xlsx');
    }
}
