<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersOfertas extends Model
{
    protected $table = 'users_ofertas';
    
    protected $fillable = [
        'user_id','oferta_id','codigo', 'canjeado'
    ];

}
