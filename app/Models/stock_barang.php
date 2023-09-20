<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock_barang extends Model
{
    protected $table='stock';
    protected $guarded=['id_stock'];
    protected $primaryKey = 'id_stock'; 

    public function stock()
    {
        return $this->hasMany(stock_barang::class, 'id_stock');
    }

    


    
    
}
