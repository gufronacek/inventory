<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class satuan extends Model
{
    protected $table = 'satuan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];


    public function barang()
    {
        return $this->hasMany(barang::class, 'id');
    }
    public function kategori()
    {
        return $this->hasMany(kategori::class, 'id');
    }
}
