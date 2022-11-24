<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterRequest;
use App\Models\Printer;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PrinterController extends Controller
{
    public function index()
    {
        $printers = Printer::latest()->get();
        return view("printer.index", ["printers" => $printers]);
    }
    public function create(PrinterRequest $request)
    {
        $request->validated();
        $data = [
            ...$request->all(),
            "user_id" => Auth::user()->id
        ];
        try {
            Printer::create($data);
            return back()->with("sukses", "Berhasil Menambahkan Data Baru");
        } catch (Throwable $e) {
            dd($e);
            return back()->with("gagal", "Terjadi Kesalahan");
        }
    }
    public function delete(Printer $printer)
    {
        $printer->delete();
        return back()->with("sukses", "Berhasil Menghapus");
    }
}
