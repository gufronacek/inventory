<?php

namespace App\Http\Controllers;

use App\Models\aksi_stok;
use App\Models\barang;
use App\Models\barang_masuk;
use App\Models\stock_barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class MasukController extends Controller
{
    public function index($id = 0)
    {
        // $data = barang::all();   
        // $data = DB::table("aksi_stok")
        // ->join("barang","barang.id_barang","aksi_stok.id_barang")
        // ->where('aksi', 'masuk')->get();

        $barang_ini = null;
        if($id != 0) {
            $barang_ini = barang::where('id_barang', $id)->first();
        };

        $pilih = DB::table("barang")->get();
        $data = aksi_stok::with('barang')->where('aksi', 'masuk')->orderBy('tanggal', 'desc')->get();  

        return view('/table.brg_masuk', ['data'=>$data, 'pilih'=>$pilih, 'barang_ini' => $barang_ini] );
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $pilih = DB::table("barang")->get();
        $masuk = aksi_stok::with('barang')->whereDate('created_at','>=',$start_date)
                                ->whereDate('created_at','<=',$end_date)
                                ->get();
        return view('/table.brg_masuk', ['data'=> $masuk,'pilih'=>$pilih,'barang_ini'=>null]);
    }


    // public function delete($id_masuk)
    // {
    
    //      DB::table('masuk')->where('id_masuk', $id_masuk)->delete();
    //      return redirect('/masuk');
    // }

    public function tambah(Request $request)
    {
        $data = request()->validate([
            'id_barang'=> 'required',
            'jumlah' => 'required'
        ]);

        $barang = barang::where('id_barang', $data['id_barang'])->first(); //tabel barang mengambil sesuai id_barang yang di masukkan di form  yang diambil dari pertama
        $stock_terakhir = aksi_stok::where('id_barang', $data['id_barang'])->orderBy('tanggal', 'desc')->first();

        barang::where('id_barang', $barang->id_barang)->update([
            'stok' => $barang->stok + $data['jumlah']
        ]);

        $catatan = array(
            'id_barang' => $data['id_barang'],
            'stok_awal' => 0,
            'jumlah' => $data['jumlah'],
            'tanggal' => Carbon::now()->format('Y-m-d H:i:s'),
            'aksi' => 'masuk',
            'keterangan' => request()->input('keterangan')
        );

        if($stock_terakhir != null) {
            $catatan['stok_awal'] = $stock_terakhir->stok_awal + $stock_terakhir->jumlah;
        };

        aksi_stok::create($catatan);

        return redirect('/view_masuk/0');
    }

    public function scan($kode = '') {
        if($kode == '') {
            return redirect('view_masuk/0');
        };

        $barang = barang::where('kd_barang', $kode)->first();

        if($barang != null) {
            return redirect('view_masuk/' . $barang->id_barang);
        };
        return redirect('view_masuk/0');
    }

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

    // // public function index()
    // // {
    // //     $masuk = barang_masuk::all();// Mengambil semua data dari tabel Stock
        
    // //      return view('table.brg_masuk', compact('masuk'));
    // // }
    
    // public function delete($id_masuk)
    // {
    //     DB::table('masuk')->where('id_masuk', $id_masuk)->delete();
    //     return redirect('masuk');
    // }

    // // public function tambah(Request $request)
    // // {
    // //     $data = request()->validate([
    // //     'id_stock'=> 'required',
    // //     'Jenis' => 'required',
    // //     'merk' => 'required',
    // //     'jumlah' => 'required',
    // //     'keterangan' => 'required'
    // //     ]);
        
    // //     $data['tanggal'] = Carbon::now();
    // //     barang_masuk::create($data);
    // //     return redirect('/masuk');
    // // }
    // public function tambah(Request $request)
    // {
    //     $data = request()->validate([
    //     'id_stock'=> 'required',
    //     'Jenis' => 'required',
    //     'merk' => 'required',
    //     'jumlah' => 'required',
    //     'keterangan' => 'required'
    //     ]);
    //     $id_stock = $data['id_stock'];
    //     $Jenis = $data['Jenis'];
    //     $merk = $data['merk'];
    //     $jumlah = $data['jumlah'];
    //     $keterangan = $data['keterangan'];

    //      $stockTerakhir = DB::table("stock")
    //     ->where("id_barang", $id_barang)
    //     ->orderBy("id_stock", "DESC")
    //     ->first();
        
    //     $data['tanggal'] = Carbon::now();
    //     barang_masuk::create($data);
    //     return redirect('/masuk');
    // }


    // public function edit($id_masuk)
    // {
    //     $edit = barang_masuk::find($id_masuk);
    //     return view('/table.brg_masuk', compact('edit'));
    // }
    // public function update(Request $request, $id_masuk)
    // {
    //     $data = barang_masuk::find($id_masuk);
    //         // $request->validate([
    //         //     'id_stock' => 'integer',
    //         // ]);
    //     $data->update($request->all());
    //     return redirect('/masuk')->with('succes', 'berhasil di update');
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


















    

    
    

