<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
     protected $table ='kategori';
     protected $primaryKey ='id';
     protected $guarded = ['id'];

     public function barang()
    {
        return $this->hasMany(barang::class, 'id');
    }

     public function satuan()
    {
        return $this->hasMany(satuan::class, 'id');
    }

}
