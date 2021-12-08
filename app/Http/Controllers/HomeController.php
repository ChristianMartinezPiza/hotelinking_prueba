<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oferta;
use App\Models\UsersOfertas;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ofertas = Oferta::all();
        return view('home', ['ofertas' => $ofertas]);
    }

    public function setUsersOfertas(Request $request){
        
        $request->validate([
            'ofertaId' => 'required'
        ]);

        $oferta = Oferta::whereId($request->ofertaId)->first();
        $user = auth()->user();
        $userOferta = UsersOfertas::where([
            'oferta_id' => $request->ofertaId,
            'user_id' => $user->id,
        ])->get()->first();

        if($userOferta){
            return redirect()->route('home')->with('error', 'Ya tienes esta oferta añadida');
        }
        
        $code = md5(uniqid(rand(), true));
        $user->ofertas()->attach($request->ofertaId, ['codigo'=>$code, 'canjeado'=>0]);

        return redirect()->route('home')->with('success', 'Oferta añadida correctamente');
    }
}
