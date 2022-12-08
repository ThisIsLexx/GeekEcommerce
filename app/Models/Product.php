<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Archivo;
use App\Models\Product;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prize',
        'info',
        'category',
        'stock',
        'img',
    ];

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function archivos(){
        return $this->hasMany(Archivo::class);
    }

    public function carritos(){
        return $this->belongsToMany(Product::class);
    }
}
