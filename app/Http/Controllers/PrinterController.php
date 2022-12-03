<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterRequest;
use App\Models\Kelas;
use App\Models\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PrinterController extends Controller
{
    public function index()
    {
        $printers = Printer::latest()->get();
        $kelas = Kelas::all();
        return view("printer.index", ["printers" => $printers, "kelas" => $kelas]);
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
    public function edit(Printer $printer)
    {
        $kelas =  Kelas::all();
        return view("printer.edit", [
            "printer" => $printer,
            "kelas" => $kelas
        ]);
    }
    public function update(Request $request, Printer $printer)
    {
        $printer->update($request->input());
        return redirect()->to(route("home"))->with("sukses", "Berhasil di Perbarui");
    }
}
