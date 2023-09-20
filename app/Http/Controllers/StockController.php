<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\stock_barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
public function index()
{
    $stock = stock_barang::all(); // Mengambil semua data dari tabel Stock

    return view('table.stk_barang', compact('stock'));
}

public function tambah(Request $request)
    {
        // dd($request);
        $tambah = $request->validate([
            'kd_barang'=> 'required|min:13',
            'nm_barang'=> 'required',
            'Jenis'=> 'required',
            'merk'=> 'required',
            'stock'=> 'required',
            'lokasi'=> 'required'
        ]);
    
        stock_barang::create($tambah);
        return redirect('/stok');

    }

public function edit($id_stock)
    {
        $edit = stock_barang::find($id_stock);
        
        return view('table.stk_barang', compact('edit'));
    }
    public function update(Request $request, $id_stock)
    {
        $edit = stock_barang::find($id_stock);
        // $request->validate([
        //     'id_barang' => 'integer',
        // ]);
        $edit->update($request->all());
        return redirect('/stok')->with('succes', 'data berhasil di update');
    }
    public function delete($id_stock)
    {
        DB::table('stock')->where('id_stock', $id_stock)->delete();
        return redirect('/stok');
    }


    

    
    // public function index()
    // {
    //     // $date = stock_barang::all()
    //     // $date = DB::table("stock")
    //     // ->join("barang","barang.id_barang","stock.id_barang")
    //     // ->get();
    //     $date = stock_barang::join('barang','barang.id_barang','stock.id_barang')
    //     ->get();
    //     return view('table.stk_barang', ['date'=> $date]);
    // }
    
    // public function edit($id_stock)
    // {
    //     $data = stock_barang::find($id_stock);
        
    //     return view('table.stk_barang', compact('data'));
    // }
    // public function update(Request $request, $id_stock)
    // {
    //     $data = stock_barang::find($id_stock);
    //     $request->validate([
    //         'id_barang' => 'integer',
    //     ]);
    //     $data->update($request->all());
    //     return redirect('/stok')->with('succes', 'data berhasil di update');
    // }
    // public function delete($id_stock)
    // {
    //     DB::table('stock')->where('id_stock', $id_stock)->delete();
    //     return redirect('/stok');
    // }
    
    
    
    
    
    
    
}


