<?php

namespace App\Http\Controllers;

use App\Models\UserProduct;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserProductController extends Controller
{
    public function index()
    {
        $data_produk = \App\Models\UserProduct::all();
        return view('userproduk.index',['data_produk' => $data_produk]);
    }
}
