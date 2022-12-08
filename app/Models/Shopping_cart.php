<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_cart extends Model
{

    protected $fillable = [
        'user_id',
        'total',
        'no_art',
    ];

    use HasFactory;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
