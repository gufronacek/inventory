<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_keluar extends Model
{
    protected $table= 'keluar';
    protected $primaryKey = 'id_keluar';
    protected $guarded = ['id_keluar'];

    public function stock(){
        return $this->belongsTo(stock_barang::class, 'id_stock');   
       }

}
