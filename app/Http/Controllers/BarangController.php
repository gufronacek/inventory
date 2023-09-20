<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $data = barang::all();
        return view('/table.barang', ['data'=> $data]);
    }

    public function tambah()
    {
        $data = request()->validate([
            'kd_barang'=> 'required|min:13',
            'nm_barang'=> 'required',
            'deskripsi'=> 'required'
        ]);
        barang::create($data);
        return redirect('/barang');

    }

    public function delete($id_barang)
    {
        DB::table('barang')->where('id_barang', $id_barang)->delete();
        return redirect('/barang');
    }
    public function edit($id_barang)
    {
        $data = barang::find($id_barang);
        return view('/table.barang', compact('data'));
    }
    
    public function update(Request $request, $id_barang)
    {
        $data = barang::find($id_barang);
        $data->update($request->all());
        return redirect('/barang')->with('succes', 'berhasil di update');
    }
    
    // public function edit($id_barang)
    // {
    //     $data = barang::find($id_barang);
    //     return view('table.barang', compact('data'));
    
    // }

    // public function edit($id_barang)
    // {
    //     $data = barang::find($id_barang);
            
    //     return view('table.stk_barang', compact('data'));
    // }
}
// public function index()
    // {
    //     $data = barang::all();
    //     return view('/table.barang', ['data'=> $data]);
    // }

    // public function tambah()
    // {
    //     $data = request()->validate([
    //         'kd_barang'=> 'required|min:13',
    //         'nm_barang'=> 'required',
    //         'deskripsi'=> 'required'
    //     ]);
    //     barang::create($data);
    //     return redirect('/barang');

    // }

    // public function delete($id_barang)
    // {
    //     DB::table('barang')->where('id_barang', $id_barang)->delete();
    //     return redirect('/barang');
    // }
    // public function edit($id_barang)
    // {
    //     $data = barang::find($id_barang);
    //     return view('/table.barang', compact('data'));
    // }
    
    // public function update(Request $request, $id_barang)
    // {
    //     $data = barang::find($id_barang);
    //     $data->update($request->all());
    //     return redirect('/barang')->with('succes', 'berhasil di update');
    // }
    
    // public function edit($id_barang)
    // {
    //     $data = barang::find($id_barang);
    //     return view('table.barang', compact('data'));
    
    // }

    // public function edit($id_stock)
    // {
    //     $data = stock_barang::find($id_stock);
            
    //     return view('table.stk_barang', compact('data'));
    // }
