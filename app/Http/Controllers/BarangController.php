<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
        {
            // $data = barang::all();
            $pilihkategori = kategori::all();
            $pilih = satuan::all();
            $data = barang::with('kategori','satuan')->get();
            return view('/table.barang', ['pilihkategori'=> $pilihkategori,'pilih'=> $pilih,'data'=> $data]);

        }
        public function tambah()
            {
                $data = request()->validate([
                    'kd_barang'=> 'required|unique:barang,kd_barang',
                    'nm_barang'=> 'required',
                    'id_kategori'=> 'required',
                    'id_satuan'=> 'required',
                ]);
            
                barang::create([
                    'kd_barang'=> $data['kd_barang'],
                    'nm_barang'=> $data['nm_barang'],
                    'stok' => 0,
                    'id_kategori'=> $data['id_kategori'],
                    'id_satuan'=> $data['id_satuan'],
                ]);                
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
        $data = request()->validate([
            'kd_barang'=> 'required',
            'nm_barang'=> 'required',
            'id_kategori'=> 'required',
            'id_satuan'=> 'required',
        ]);
    $barang = barang::where('kd_barang',$data['kd_barang'])->first();
         if ($barang !=null) {
            if ($barang->id_barang == $id_barang) {
                barang::where('id_barang',$id_barang)->update($data);  
            }
        } else {
            barang::where('id_barang',$id_barang)->update($data);
        }
            
        return redirect('/barang')->with('succes', 'berhasil di update');
    }
    

}
//

//    

//     
//     
    
    
    
