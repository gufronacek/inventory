<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('layout.dashboard');
    }
    

    
}
