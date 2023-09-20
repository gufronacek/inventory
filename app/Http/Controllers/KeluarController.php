<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_keluar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KeluarController extends Controller
{
    
    public function index()
    {   
        $keluar = barang_keluar::all();
        // $keluar = DB::table("keluar")
        // ->join("stock","stock.id_stock","keluar.id_stock")
        // ->get();
        $pilih = DB::table("stock")->get();
        // return view('table.brg_keluar', ['keluar'=>$keluar, 'pilih'=>$pilih]);
        return view('table.brg_keluar', ['keluar'=>$keluar,'pilih'=>$pilih]);
    }

    // public function index()
    // {
    //     // $data = barang::all();   
    //     $masuk = DB::table("masuk")
    //     ->join("stock","stock.id_stock","masuk.id_stock")
    //     ->get();
    //     $pilih = DB::table("stock")->get();  // Mengambil semua data dari tabel Stock

    //     return view('/table.brg_masuk', ['masuk'=>$masuk, 'pilih'=> $pilih] );
    // }
        

        
    

    public function delete($id_keluar)
    {
        DB::table('keluar')->where('id_keluar', $id_keluar)->delete();
        return redirect('/keluar');
    }
    
    public function tambah(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'id_stock'=> 'required',
            'jumlah'=> 'required',
            'penerima'=> 'required',
            'keterangan '=> 'required'
        ]);
        
        
        $data['tanggal'] =  Carbon::new();
        barang_keluar::create($data);
        return redirect('/keluar');
    }
    // public function tambah(Request $request)
    // {
    //     $data = request()->validate([
    //     'id_stock'=> 'required',
    //     'Jenis' => 'required',
    //     'merk' => 'required',
    //     'jumlah' => 'required',
    //     'keterangan' => 'required'
    //     ]);
        
    //     $data['tanggal'] = Carbon::now();
    //     barang_masuk::create($data);
    //     return redirect('/masuk');
    // }
    
    public function edit($id_keluar)
    {
        $data = barang_keluar::find($id_keluar);
        return view('table.brg_keluar', compact('data'));
    }

    public function update(Request $request, $id_keluar)
    {
        $data = barang_keluar::find($id_keluar);
        $data->update($request->all());
        return redirect('/keluar')->with('succes', 'berhasil di update');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // public function keluar()
    // {
    //     $data = barang_keluar::all();

    //     return view('table.brg_keluar', ['data'=> $data]);
    // }

    // public function tambah()
    // {
    //     $data = request()->validate([
    //         'id_barang'=> 'required',
    //         'jumlah'=> 'required'
        
    //     ]);
    //     $data['tanggal'] = Carbon::now();
    //     barang_keluar::create($data);
    //     return redirect('/keluar');
    // }

    // public function delete($id_keluar)
    // {
    //     DB::table('keluar')->where('id_keluar', $id_keluar)->delete();
    //     return redirect('/keluar');
    // }
    // public function edit($id_keluar)
    // {
    //     $data = barang_keluar::find($id_keluar);
    //     return view('table.brg_keluar', compact('data'));
    // }

    // public function update(Request $request, $id_keluar)
    // {
    //     $data = barang_keluar::find($id_keluar);
    //     $data->update($request->all());
    //     return redirect('/keluar')->with('succes', 'berhasil di update');
    // }
}
