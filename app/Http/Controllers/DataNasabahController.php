<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataNasabahExport;
use App\Imports\DataNasabahImport;
use Illuminate\Support\Facades\DB;
use App\DataNasabah;
use Session;
use Illuminate\Support\Carbon;

class DataNasabahController extends Controller
{
    public function index() {
        $dn = DataNasabah::all();
        return view('nasabah.DataNasabah',['dn' => $dn]);
    }

    public function edit(Request $request) {
        $data = DB::table('data_nasabah')->where('id', $request->id)->first();
        return view('nasabah.EditNasabah',['data' => $data]);
    }

    public function update(Request $request) {
        // untuk validasi form
    $rules = [
        'nama' => 'required',
        'tlp' => 'required',
        'alamat' => 'required',
        'email' => 'required'
    ];

    $customMessages = [
        'nama.required' => 'Nama Harus Diisi !',
        'tlp.required' => 'Nomor Telepon Harus Diisi !',
        'alamat.required' => 'Alamat Harus Diisi !',
        'email.required' => 'Email Harus Diisi !',
    ];

    $this->validate($request, $rules, $customMessages);
    // update data books
    DB::table('data_nasabah')->where('id', $request->id)->update([
        'nama' => $request->nama    ,
        'tlp' => $request->tlp,
        'alamat' => $request->alamat,
        'email' => $request->email,
        'updated_at' => now(),
    ]);
    // alihkan halaman edit ke halaman books
        return redirect()->route('nasabah')->with('status', 'Data Nasabah Berhasil DiUbah');
    }

    public function create()
    {
        return view('nasabah.CreateNasabah');
    }

    protected function store(Request $request)
    {
        // untuk validasi form
        $rules = [
            'nama' => 'required',
            'tlp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        $customMessages = [
            'nama.required' => 'Nama Harus Diisi !',
            'tlp.required' => 'Nomor Telepon Harus Diisi !',
            'alamat.required' => 'Alamat Harus Diisi !',
            'email.required' => 'Email Harus Diisi !',
        ];

        $this->validate($request, $rules, $customMessages);
        // update data books
        DB::table('data_nasabah')->insert([
            'nama' => $request->nama    ,
            'tlp' => $request->tlp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'created_at' => now(),
        ]);
        // alihkan halaman edit ke halaman books
            return redirect()->route('nasabah')->with('status', 'Data Nasabah Berhasil Dibuat !');
    }

    protected function delete(Request $request)
    {
        return $this->destroy($request->id);
    }

    protected function destroy($id)
    {
        DB::table('data_nasabah')->where('id', $id)->delete();
        return redirect()->route('nasabah')->with('status', 'Data Nasabah Berhasil Dihapus !');
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
