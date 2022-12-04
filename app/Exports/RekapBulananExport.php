<?php

namespace App\Exports;

use App\Models\Printer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapBulananExport implements FromView
{
    private $totalBiaya = 0;
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
        foreach ($printers as $printer) {
            $this->totalBiaya += $printer->biaya;
        }
        return view("printer.excel", [
            "printers" => $printers,
            "bulan" => $this->bulan,
            "tahun" => $this->tahun,
            "total" => $this->totalBiaya
        ]);
    }
}
