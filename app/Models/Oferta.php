<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Oferta extends Model
{
    use HasFactory;
    
    public function getUserRelation(){
        return $this->belongsToMany(User::class, 'users_ofertas', 'id', 'id');
    }
}
