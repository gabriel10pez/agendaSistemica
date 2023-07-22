<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $tipo = TipoEvento::all();
        $usuarios = User::all();
        
        return view('evento.index', compact('tipo', 'usuarios'));
        // return redirect()->route()
    }
}
