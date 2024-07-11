<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apuesta;
use App\Models\Juego;

class ApuestaController extends Controller
{
    public function index()
    {
        $apuestas = Apuesta::with('juego')->get();
        return view('apuestas.index', compact('apuestas'));
    }

    public function mayores3Jugadores()
    {
        $apuestas = Apuesta::whereHas('juego', function ($query) {
            $query->where('cantidad_jugadores', '>', 3);
        })->get();
        return view('apuestas.mayores3Jugadores', compact('apuestas'));
    }

    public function comparacionCartas()
    {
        $totalCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', true);
        })->sum('monto');
    
        $totalNoCartas = Apuesta::whereHas('juego', function ($query) {
            $query->where('juego_de_cartas', false);
        })->sum('monto');
    
        $resultado = $totalCartas > $totalNoCartas ? 'mayor' : 'menor';
    
        return view('apuestas.comparacionCartas', compact('totalCartas', 'totalNoCartas', 'resultado'));
    }
    
    public function buscarPorJuego($idJuego)
    {
        $apuestas = Apuesta::where('id_juego', $idJuego)->get();
        return view('apuestas.buscarPorJuego', compact('apuestas'));
    }

    public function create()
    {
        $juegos = Juego::all();
        return view('apuestas.create', compact('juegos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_juego' => 'required|exists:juegos,id',
            'fecha' => 'required|date',
            'monto' => 'required|integer',
        ]);

        Apuesta::create($request->all());

        return redirect()->route('apuestas.index');
    }
}
