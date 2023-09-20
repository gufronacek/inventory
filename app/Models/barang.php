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
    // public function keluar()
    // {
    //     return $this-> hasMany(barang_keluar::class, 'id_keluar', ' id_keluar');
    // }

    



    
}
