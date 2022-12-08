<?php

namespace App\Models;

use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'ubicacion',
        'nombre_original',
        'mime',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
