<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $data_karyawan = \App\Models\Karyawan::all();
        return view('karyawan.index',['data_Karyawan' => $data_karyawan]);
    }
    public function create(Request $request)
    {
        \App\Models\Karyawan::create($request->all());
        return redirect('/karyawan')-> with('sukses','Data berhasil di Tambahkan');
    }
    public function edit($id)
    {
        $data_karyawan = \App\Models\Karyawan::find($id);
        return view('karyawan.edit',['karyawan' => $data_karyawan]);
    }
    public function update(Request $request, $id)
    {
        $data_karyawan = \App\Models\Karyawan::find($id);
        $data_karyawan->update($request->all());
        return redirect('karyawan')->with('sukses','Data berhasil di Edit');
    }
    public function delete($id)
    {
        $data_karyawan = \App\Models\Karyawan::find($id);
        $data_karyawan->delete();
        return redirect('karyawan')->with('sukses','Data berhasil di Hapus');
    }
}
