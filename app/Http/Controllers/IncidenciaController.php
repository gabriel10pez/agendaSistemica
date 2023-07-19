<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('incidencia.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidencia = new Incidencia();

        if($request->hasFile('foto_incidencia')){
            $archivo = $request->file('foto_incidencia')->store('public/imagen');
            $url = Storage::url($archivo);
            $incidencia->foto_incidencia = $url;
        }
        $incidencia->titulo_incidencia = $request->titulo_incidencia;
        $incidencia->descripcion = $request->descripcion;
        // $incidencia->foto_incidencia = $request->foto_incidencia;
        $incidencia->fecha_incidencia = Carbon::now();
        $incidencia->user_id = auth()->user()->id;

        $incidencia->save();
        
        return Redirect::route('incidencias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencia $incidencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencia $incidencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencia $incidencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencia $incidencia)
    {
        //
    }
}
