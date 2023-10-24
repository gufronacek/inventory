<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aksi_stok extends Model
{
    protected $table='aksi_stok';
    protected $primaryKey = 'id';
    protected $guarded= ['id'];


    public function barang()
    {
        return $this->belongsTo(barang::class, 'id_barang');
    }
    public function kategori(){
        return $this->belongsTo(kategori::class, 'id_kategori');   
       }
    public function satuan(){
        return $this->belongsTo(satuan::class, 'id_satuan');   
       }

    
}

 
