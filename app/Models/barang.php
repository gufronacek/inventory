<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table='barang';
    protected $primaryKey = 'id_barang';
    protected $guarded= ['id_barang'];

    public function stock()
    {
        return $this->hasMany(stock_barang::class, 'id_stock');
    }

    public function masuk()
    {
        return $this->hasMany(barang_masuk::class, 'id_masuk', 'id_masuk');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class,'id_kategori');
    }
    public function satuan()
    {
        return $this->belongsTo(satuan::class,'id_satuan');
    }
    // public function keluar()
    

    



    
}
