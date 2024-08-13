<?php

namespace App\Exports;

use App\Product;
use App\Http\Resources\ResourceProducts;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use phpDocumentor\Reflection\Types\Resource_;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize
{

    public function registerEvents() : array
    {
       return [
            AfterSheet::class => function(AfterSheet $titulo){
                $titulo->sheet->styleCells('A1:W1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13
                    ]
                ]);
            }
       ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function headings() : array{

        return ['ID', 'Categoria', 'Subcategoria', 'Título', 'Descrição', 'Características', 'Valor', 'Valor Promocional'];

    }

    /**
     * @return array
     */
    public function registerCells(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:W999999999999999999999999999999')->getAlignment()->setIndent(Alignment::HORIZONTAL_LEFT)->set;
            },
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->join('subcategories', 'subcategories.id', 'products.subcategory_id')
            ->join('stocks', 'stocks.product_id', 'products.id')
            ->select(
                'products.id',
                'categories.title as categoryTitle',
                'subcategories.title as subcategoryTitle',
                'products.title',
                'products.description',
                'products.feature',
                'stocks.amount as stockAmount',
                'stocks.promotion_value as stockPromotionValue',
            )
            ->groupBy('products.id')
            ->get();

        return ResourceProducts::collection($products);
    }
}
