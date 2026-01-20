<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Stocks;
use App\Models\StocksTransaction;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

use function Symfony\Component\String\s;

class ReportController extends Controller
{
    public function downloadStockTransactions()
    {
        $transactions = StocksTransaction::with(['items', 'warehouse', 'users'])
            ->latest()
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'A1' => 'Tanggal',
            'B1' => 'Sku',
            'C1' => 'Item',
            'D1' => 'Gudang',
            'E1' => 'Tipe Transaksi',
            'F1' => 'Quantity',
            'G1' => 'Diproses Oleh',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        // Data
        $row = 2;
        foreach ($transactions as $trx) {
            $sheet->setCellValue("A{$row}", $trx->created_at->format('Y-m-d H:i'))->getColumnDimension('A')->setAutoSize(true);
            $sheet->setCellValue("B{$row}", $trx->items->sku ?? '-')->getColumnDimension('B')->setAutoSize(true);
            $sheet->setCellValue("C{$row}", $trx->items->unit ?? '-')->getColumnDimension('C')->setAutoSize(true);
            $sheet->setCellValue("D{$row}", $trx->warehouse->name ?? '-')->getColumnDimension('D')->setAutoSize(true);
            $sheet->setCellValue("E{$row}", strtoupper($trx->type))->getColumnDimension('E')->setAutoSize(true);
            $sheet->setCellValue("F{$row}", $trx->quantity)->getColumnDimension('F')->setAutoSize(true);
            $sheet->setCellValue("G{$row}", $trx->users->name ?? '-')->getColumnDimension('G')->setAutoSize(true);
            $row++;
        }

        $sheet->getStyle('A1:G1')->getFont()->setBold(true);

        $writer = new Xlsx($spreadsheet);

        $filename = 'stock_transactions_' . now()->format('Ymd_His') . '.xlsx';

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Cache-Control' => 'max-age=0',
        ]);
    }
    public function downloadItems()
    {
        $items = Items::with('category')->orderBy('unit')->get();

        if ($items->isEmpty()) {
            abort(404, 'Data item kosong');
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'A1' => 'SKU',
            'B1' => 'Unit',
            'C1' => 'Kategori',
            'D1' => 'Deskripsi',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);

        // Data
        $row = 2;
        foreach ($items as $item) {
            $sheet->setCellValue("A{$row}", $item->sku)->getColumnDimension('A')->setWidth(10);
            $sheet->setCellValue("B{$row}", $item->unit)->getColumnDimension('B')->setAutoSize(true);
            $sheet->setCellValue("C{$row}", optional($item->category)->name ?? '-')->getColumnDimension('C')->setWidth(30);
            $sheet->setCellValue("D{$row}", optional($item)->description ?? '-')->getColumnDimension('D')->setWidth(30);
            $row++;
        }

        // set header to bold
        $sheet->getStyle('A1:G1')->getFont()->setBold(true);

        $writer = new Xlsx($spreadsheet);
        $filename = 'items_' . now()->format('Ymd_His') . '.xlsx';

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    public function downloadStocks()
    {
        $stocks = Stocks::with(['items', 'warehouse'])
            ->orderBy('warehouse_id')
            ->get();

        if ($stocks->isEmpty()) {
            abort(404, 'Data stok kosong');
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $headers = [
            'A1' => 'Gudang',
            'B1' => 'SKU',
            'C1' => 'Unit',
            'D1' => 'Stok Awal',
            'E1' => 'Jumlah Stok',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        $sheet->getStyle('A1:E1')->getFont()->setBold(true);

        // Data
        $row = 2;
        foreach ($stocks as $stock) {
            $sheet->setCellValue("A{$row}", optional($stock->warehouse)->name ?? '-')->getColumnDimension('A')->setAutoSize(true);
            $sheet->setCellValue("B{$row}", optional($stock->items)->sku ?? '-')->getColumnDimension('B')->setAutoSize(true);
            $sheet->setCellValue("C{$row}", optional($stock->items)->unit ?? '-')->getColumnDimension('C')->setAutoSize(true);
            $sheet->setCellValue("D{$row}", $stock->initial_stock)->getColumnDimension('D')->setAutoSize(true);
            $sheet->setCellValue("E{$row}", $stock->quantity)->getColumnDimension('E')->setAutoSize(true);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'stocks_' . now()->format('Ymd_His') . '.xlsx';

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }
}
