<?php

namespace App\Http\Controllers;

use App\Models\DaftarUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index()
    {
        $data_user = \App\Models\DaftarUser::all();
        return view('user.index',['data_user' => $data_user]);
    }
    public function edit($id)
    {
        $data_user = \App\Models\DaftarUser::find($id);
        return view('user.edit',['data_user' => $data_user]);
    }
    public function update(Request $request, $id)
    {
        $data_user = \App\Models\DaftarUser::find($id);
        $data_user->update($request->all());
        return redirect('datapelanggan')->with('sukses','Data berhasil di Edit');
    }
}
