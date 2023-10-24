<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class KategoriController extends Controller
{
    public function index()
        {
            $kategori = kategori::all();
            return view('/table.kategori', ['kategori'=> $kategori]);
        }


    public function tambah(Request $request)
    {
        {
            $request->validate([
                'kategori' => 'required|unique:kategori',
            ]);
        
            Kategori::create([
                'kategori' => $request->input('kategori'),
            ]);
            // dd($request);
        
            return redirect('/kategori')->with('success', 'Data berhasil ditambahkan.');
        }
    }


    public function edit($id)
    {
        $edit = kategori::find($id);
        return view('table.kategori', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $data = kategori::find($id);
        $data->update($request->all());
        Return redirect('/kategori')->with('succes','berhasil di update');
    }
}

