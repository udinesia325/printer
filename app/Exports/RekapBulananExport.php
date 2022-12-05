<?php

namespace App\Exports;

use App\Models\Printer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapBulananExport implements FromView
{
    private $bulan;
    private $tahun;
    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }
    public function view(): View
    {
        $printers =  Printer::whereMonth('created_at', $this->bulan)
            ->whereYear('created_at', $this->tahun)
            ->get();
        $totalBiaya = 0;
        foreach ($printers as $printer) {
            $totalBiaya += $printer->biaya;
        }
        return view("printer.excel", [
            "printers" => $printers,
            "bulan" => $this->bulan,
            "tahun" => $this->tahun,
            "total" => $totalBiaya
        ]);
    }
}
