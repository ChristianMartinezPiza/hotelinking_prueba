<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oferta;
use App\Models\UsersOfertas;
use Auth;

class OfertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $ofertas = $user->ofertas;
        return view('ofertas', ['ofertas' => $ofertas]);
    }

    public function setCanjeado(Request $request){
        
        $request->validate([
            'ofertaId' => 'required'
        ]);

        $user = auth()->user();
        $userOferta = UsersOfertas::where([
            'oferta_id' => $request->ofertaId,
            'user_id' => $user->id,
        ])->get()->first();
        if(!$userOferta){
            return redirect()->route('ofertas')->with('error', 'Esta oferta no está añadida');
        }
        elseif($userOferta->canjeado){
            return redirect()->route('ofertas')->with('error', 'Esta oferta ya está canjeada');
        }
        UsersOfertas::where([
            'oferta_id' => $request->ofertaId,
            'user_id' => $user->id,
        ])->update(array('canjeado' => 1));

        return redirect()->route('ofertas')->with('success', 'Oferta canjeada correctamente');
    }
}
