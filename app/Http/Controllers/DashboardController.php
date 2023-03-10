<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\pemasukkan;


class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan = pemasukkan::all();
        return view('windmill-dashboard.public.index', compact('pemasukan'));
    }

    public function tambahmasuk()
    {
        return view('windmill-dashboard.public.tambah-masuk');
    }
    public function store(Request $request)
    {
        pemasukkan::create($request->except(['_token','submit']));
        return redirect('/data_pemasukan');
    }
    
    public function insertmasuk(Request $request)
    {
        $data = $request->all();
        $masuk = new pemasukkan();
        $masuk->jenis = $data['jenis'];
        $masuk->nama = $data['nama'];
        $masuk->banyak = $data['banyak'];
        $masuk->harga_satuan = $data['harga_satuan'];
        $masuk->jumlah = $data['jumlah'];
        $masuk->save();
        return redirect()->route('dashboard');
    }

    public function delete(string $id_pemasukan)
    {
        pemasukkan::where('id_pemasukan',$id_pemasukan)->delete();
        return redirect()->to('dashboard')->with('success');
    }

}