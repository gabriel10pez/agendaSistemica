<?php

namespace App\Http\Controllers;

use App\Models\Memorandum;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MemorandumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('memoranda.memoindex');
    }
    public function report( $id){
        //$memos = Memorandum::all();
        $memos = Memorandum::select('memoranda.id', 'memoranda.numero_memorandum', 'memoranda.anio_memorandum', 'memoranda.remitente_memorandum', 'memoranda.cuerpo_memorandum', 'memoranda.created_at', 'memoranda.updated_at', 'tipo_eventos.nombre_tipo_evento')
            ->join('events', 'events.id', '=', 'memoranda.event_id')
            ->join('tipo_eventos', 'tipo_eventos.id', '=', 'events.tipo_event_id')
            ->where('memoranda.id' , $id)
            ->paginate(10);

        $memos->each(function ($memo, $index) use ($memos) {
            $memo->rowNumber = $memos->firstItem() + $index;
        });

        $pdf = Pdf::loadView('memoranda.report', compact('memos'));

        return $pdf->stream('invoice.pdf');
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
    public function show(Memorandum $memorandum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memorandum $memorandum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memorandum $memorandum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memorandum $memorandum)
    {
        //
    }
}
