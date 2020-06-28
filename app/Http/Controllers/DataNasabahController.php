<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataNasabahExport;
use App\Imports\DataNasabahImport;
use App\DataNasabah;
use Session;

class DataNasabahController extends Controller
{
    public function index() {
        $dn = DataNasabah::all();
        return view('DataNasabah',['dn' => $dn]);
    }

    protected function export_excel() {
        return Excel::download(new DataNasabahExport, 'nasabah.xlsx');
    }

    protected function import_excel(Request $request) {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_nasabah di dalam folder public
        $file->move('file_nasabah', $nama_file);

        // import data
        Excel::import(new DataNasabahImport, public_path('/file_nasabah/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data nasabah Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/nasabah');
    }
}
