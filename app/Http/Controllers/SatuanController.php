<?php

namespace App\Http\Controllers;

use App\Models\satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    
    public function index()
    {
        $satuan = satuan::all();
        return view('/table.satuan',['satuan'=> $satuan]);
    }

    public function tambah(Request $request)
    {
        {
            $request->validate([
                'satuan' => 'required',
            ]);
            satuan::create([
                'satuan' => $request->input('satuan'),
            ]);

            return redirect('/satuan');

        }
    }

    public function edit($id)
    {
        $data = satuan::find($id);
        return view('table.satuan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = satuan::find($id);
        $data->update($request->all());
        return redirect('/satuan')->with('succes','berhasil di update');
    }
}
