<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    protected $table='masuk';
    protected $primaryKey = 'id_masuk';
    protected $guarded= ['id_masuk'];
    
    
    // $stokBarangMasuk = (int)$data['jumlah'];


    public function stock()
    {
        return $this->belongsTo(stock_barang::class, 'id_stock', 'id_stock');
    }
    // public function barang(){
    //     return $this->belongsTo(barang::class, 'id_barang');   
    //    }

    
}

 
