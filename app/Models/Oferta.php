<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Oferta extends Model
{
    Protected $fillable=[
        'title'
    ];
    
    public function users(){
        return $this->belongsToMany(User::class, 'users_ofertas', 'oferta_id', 'user_id')->withPivot('canjeado', 'codigo');
    }
}
