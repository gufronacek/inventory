<?php

namespace App\Http\Controllers;

use App\Models\aksi_stok;
use App\Models\barang;
use Illuminate\Http\Request;
use App\Models\barang_keluar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KeluarController extends Controller
{
    public function index($id = 0) {

        $barang_ini =  null;
        if ($id !=0) {
            $barang_ini = barang::where('id_barang',$id)->first();
        };

        $pilih = DB::table("barang")->where('stok', '>', 0)->get();
        $data = aksi_stok::with('barang')->where('aksi', 'keluar')->orderBy('tanggal', 'desc')->get();  

        return view('/table.brg_keluar', ['data'=>$data, 'pilih'=>$pilih,'barang_ini' => $barang_ini]);
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $pilih =  DB::table('barang')->get();
        $keluar = aksi_stok::with('barang')->whereDate('created_at','>=',$start_date)
                            ->whereDate('created_at','<=',$end_date)
                            ->get();
        return view('/table.brg_keluar', ['data'=>$keluar,'pilih'=>$pilih,'barang_ini'=>null]);
    }

    public function kurangi(Request $request)
    {
        $data = request()->validate([
            'id_barang'=> 'required',
            'jumlah' => 'required'
        ]);

        $barang = barang::where('id_barang', $data['id_barang'])->first(); //tabel barang mengambil sesuai id_barang yang di masukkan di form  yang diambil dari pertama

        if($data['jumlah'] > $barang->stok) {
            return redirect('/view_keluar/0');

        };

        $stock_terakhir = aksi_stok::where('id_barang', $data['id_barang'])->orderBy('tanggal', 'desc')->first();

        barang::where('id_barang', $barang->id_barang)->update([
            'stok' => $barang->stok - $data['jumlah']
        ]);

        $catatan = array(
            'id_barang' => $data['id_barang'],
            'stok_awal' => $stock_terakhir->stok_awal + $stock_terakhir->jumlah,
            'jumlah' => 0 - $data['jumlah'],
            'tanggal' => Carbon::now()->format('Y-m-d H:i:s'),
            'aksi' => 'keluar',
            'keterangan' => request()->input('keterangan')
        );
        aksi_stok::create($catatan);

        return redirect('/view_keluar/0');
    }

    public function scan($kode = ''){
        if ($kode == '') {
            return redirect('/view_keluar/0'); 
        };
        $barang = barang::where('kd_barang', $kode)->first();
         
        if ($barang != null) {
            return redirect('view_keluar/0' . $barang->id_barang);
        };
        return redirect('/view_keluar/0');
    }

    
    // public function index()
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
    
    // public function index()
    // {
    //     $keluar = barang_keluar::all();
    //      return view('table.brg_keluar', compact('keluar'));
    // }

    // public function delete($id_keluar)
    // {
    //     DB::table('keluar')->where('id_keluar', $id_keluar)->delete();
    //     return redirect('/keluar');
    // }
    
    // public function tambah(Request $request){
    //     $data = request()->validate([
    //         'id_stock'=> 'required',
    //         'jumlah'=> 'required',
    //         'penerima'=> 'required',
    //         'keterangan '=> 'required'
    //     ]);
    //     $data['tanggal'] =  Carbon::new();
    //     barang_keluar::create($data);
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
