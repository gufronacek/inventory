<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barang_masuk;
use App\Models\stock_barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class MasukController extends Controller
{
    public function index()
    {
        // $data = barang::all();   
        $masuk = DB::table("masuk")
        ->join("stock","stock.id_stock","masuk.id_stock")
        ->get();
        // $masuk = barang_masuk::join('stock','barang_masuk.id_masuk', '=','stock.id_stock')
        // ->select('barang_masuk.*','stock.barang_masuk','stock.stock_barang')
        // ->get();
    
        $pilih = DB::table("stock")->get();  // Mengambil semua data dari tabel Stock
        
        return view('table.brg_masuk', ['masuk'=>$masuk, 'pilih'=> $pilih] );
    }

    // public function index()
    // {
    //     $masuk = barang_masuk::all();// Mengambil semua data dari tabel Stock
        
    //      return view('table.brg_masuk', compact('masuk'));
    // }
    
    public function delete($id_masuk)
    {
        DB::table('masuk')->where('id_masuk', $id_masuk)->delete();
        return redirect('masuk');
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
    public function tambah(Request $request)
    {
        $data = request()->validate([
        'id_stock'=> 'required',
        'Jenis' => 'required',
        'merk' => 'required',
        'stock' => 'required',
        'keterangan' => 'required'
        ]);
        $data['tanggal'] = Carbon::now();

        // Ambil stok yang sudah ada berdasarkan id_stock
        $existingStock = stock_barang::find($data['id_stock']);
    
        if ($existingStock) {
            // Stok sudah ada, tambahkan stock baru ke stok yang ada
            $existingStock->stock += $data['stock'];
            $existingStock->save();
        } else {
            // Stok belum ada, buat stok baru
            $stockData = [
                'id_stock' => $data['id_stock'],
                'Jenis' => $data['Jenis'],
                'merk' => $data['merk'],
                'stock' => $data['stock'],
                'keterangan' => $data['keterangan'],
                'tanggal' => $data['tanggal']
            ];
            stock_barang::create($stockData);
        }
    
        return redirect('/masuk');
    }


    public function edit($id_masuk)
    {
        $edit = barang_masuk::find($id_masuk);
        return view('/table.brg_masuk', compact('edit'));
    }
    public function update(Request $request, $id_masuk)
    {
        $data = barang_masuk::find($id_masuk);
            // $request->validate([
            //     'id_stock' => 'integer',
            // ]);
        $data->update($request->all());
        return redirect('/masuk')->with('succes', 'berhasil di update');
    }

}
    



    // public function masuk()
    // {
    //     // $data = barang::all();   
    //     $data = DB::table("masuk")
    //     ->join("barang","barang.id_barang","masuk.id_barang")
    //     ->get();
    //     $pilih = DB::table("barang")->get();  

        
    //     return view('/table.brg_masuk', ['data'=>$data, 'pilih'=>$pilih] );
    // }


    // public function delete($id_masuk)
    // {
    
    //      DB::table('masuk')->where('id_masuk', $id_masuk)->delete();
    //      return redirect('/masuk');
    // }

    // public function tambah(Request $request)
    // {
    //     // dd($request->all());

    //     $data = request()->validate([
    //         'id_barang'=> 'required',
    //         'jumlah' => 'required'
    //     ]);

    //     $id_barang = $request->id_barang;
    //     $jumlahMasuk = $request->jumlah;
    //     $stockTerakhir= DB::table("stock")->where("id_barang",$id_barang)->orderBy("id_stock","DESC")->first();

    //     if ($stockTerakhir != null) {
    //         $stockBaru = $stockTerakhir->stock + $jumlahMasuk;
    //         $dataStock = [
    //             'id_barang' => $id_barang,
    //             'stock' => $stockBaru,
    //             'tanggal' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ];

    //         $dataMasuk = [
    //             'id_barang' => $id_barang,
    //             'jumlah' => $jumlahMasuk,
    //             'tanggal' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ];

    //         DB::table("stock")
    //         ->insert($dataStock);

    //         DB::table("masuk")
    //         ->insert($dataMasuk);

    //     }else {
    //         $dataStock = [
    //             'id_barang' => $id_barang,
    //             'stock' => $jumlahMasuk,
    //             'tanggal' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ];

    //         $dataMasuk = [
    //             'id_barang' => $id_barang,
    //             'jumlah' => $jumlahMasuk,
    //             'tanggal' => Carbon::now(),
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ];

    //         DB::table("stock")
    //         ->insert($dataStock);

    //         DB::table("masuk")
    //         ->insert($dataMasuk);

    //         // barang_masuk::create([
    //         //     'id_barang' => $data['id_barang'],
    //         //     'jumlah' => $data['jumlah'],
    //         //     'tanggal' => $data['tanggal']
    //         // ]);
            
    //         // stock_barang::create([
    //         //     'id_barang' => $data['id_barang'],
    //         //     'stock' => $data['stock'],
    //         //     'tanggal' => $data['tanggal']
    //         // ]);            
    //     }
    //     return redirect('/masuk');
    // }

    // public function edit($id_masuk)
    // {
    //     $data = barang_masuk::find($id_masuk);
    //     return view('/table.brg_masuk', compact('data'));
    // }
    // public function update(Request $request, $id_masuk)
    // {
    //     $data = barang_masuk::find($id_masuk);
    //     // $request->validate([
    //     //     'id_barang' => 'integer',
    //     // ]);
    //     $data->update($request->all());
    //     return redirect('/masuk')->with('succes', 'berhasil di update');
    // }



    // public function edit($id_masuk)
    // {
    //     $data = barang_masuk::find($id_masuk);

    //     return view('/table.brg_masuk', compact('data'));
    // }

    
    

