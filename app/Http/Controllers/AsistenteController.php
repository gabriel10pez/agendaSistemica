<?php

namespace App\Http\Controllers;

use App\Models\Asistente;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AsistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistente $asistente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistente $asistente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asistente $asistente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistente $asistente)
    {
        //
    }

    public function reportes_pdf(User $user)
    {
        // return $user;
        $reportes = Asistente::join('users', 'asistentes.id_asistente_usuario', '=', 'users.id')
            ->join('events', 'asistentes.event_id', '=', 'events.id')
            ->select('users.*', 'users.id as userid', 'asistentes.*', 'asistentes.id as asistenteid', 'events.*', 'events.id as eventid')
            ->where('asistentes.id_asistente_usuario', $user->id)
            ->get();

        $asistotal = Asistente::where('asistentes.id_asistente_usuario', $user->id)->count();

        // Contar cuántos registros tienen valor 1 en la columna "asistio"
        $asistio = Asistente::where('asistentes.id_asistente_usuario', $user->id)
            ->where('asistio', 1)
            ->count();

        // Contar cuántos registros tienen valor null en la columna "asistio"
        $noasistio = Asistente::where('asistentes.id_asistente_usuario', $user->id)
            ->whereNull('asistio')
            ->count();

        $pdf = Pdf::loadView('reporte.reportepdf', ['reportes' => $reportes, 'asistotal' => $asistotal, 'asistio' => $asistio, 'noasistio' => $noasistio]);
        return $pdf->stream();
    }
}
