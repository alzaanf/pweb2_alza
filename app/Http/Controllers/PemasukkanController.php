<?php

namespace App\Http\Controllers;

use App\Models\pemasukkan;
use Illuminate\Http\Request;

class PemasukkanController extends Controller
{
    public function index()
    {
        $pemasukkan = pemasukkan::all();
        return view('windmill-dashboard.public.formpemasukkan',compact(['pemasukkan']));
    }

    public function store(Request $request)
    {
        pemasukkan::create($request->except(['_token','submit']));
        return redirect('/pemasukkan');
    }
}
