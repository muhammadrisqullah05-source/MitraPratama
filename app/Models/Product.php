<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'nama_barang', 'detail','harga_barang','stock', 'image'
        
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
