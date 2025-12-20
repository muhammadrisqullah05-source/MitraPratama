<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $data_pesanan = \App\Models\Pesanan::all();
        return view('pesanan.index',['data_Karyawan' => $data_pesanan]);
    }
}
