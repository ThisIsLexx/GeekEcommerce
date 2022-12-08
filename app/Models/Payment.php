<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'card_number',
        'expiration_date',
        'cvv',
    ];

    public $timestamps = false;


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tarjeta(){
        

        $caracter = '************'.$this->card_number[12].$this->card_number[13].$this->card_number[14].$this->card_number[15];
        return $caracter;
    }
}
