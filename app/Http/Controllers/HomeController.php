<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    public function index()
    {
        $data = [
            'barang' => DB::table('barang')->count(),
            'aksi_stok' => DB::table('aksi_stok')->count(),
            'users' => DB::table('users')->count(),
        ];
        // dd($data);
        return view('layout.dashboard', $data);
    }
    

    
}
