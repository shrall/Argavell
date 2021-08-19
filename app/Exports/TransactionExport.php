<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransactionExport implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths
{

    protected $type;

    function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        return view('admin.transaction.export', [
            'transactions' => Transaction::all()
        ]);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:W1000')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:W1000')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:W1000')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            'A1:W1000' =>
            [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                    ],
                ]
            ]
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
        ];
    }
}
