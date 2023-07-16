<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $evento = Evento::all();
        // return $evento;
        return view('evento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evento::$rules);

        DB::table('events')->insert([
            'user_id' => auth()->user()->id,
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'start' => request()->input('start') . ' ' . request()->input('startH'),
            'end' => request()->input('end') . ' ' . request()->input('endH'),
            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //$evento = Evento::all();
        $evento = DB::table('events')->where('user_id', '=', auth()->user()->id)->get();
        return response()->json($evento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        $evento->startF = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        $evento->endF = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

        $evento->startH = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('H:i:s');
        $evento->endH = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('H:i:s');
        return response()->json($evento);
        //return $evento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);

        DB::table('events')
            ->where('id', request()->id)
            ->update([
                'user_id' => Auth::user()->id,
                'title' => request()->input('title'),
                'description' => request()->input('descripcion'),
                'start' => request()->input('start') . ' ' . request()->input('startH'),
                'end' => request()->input('end') . ' ' . request()->input('endH')
            ]);

        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Evento::find($id)->delete();
        return response()->json($evento);
    }
}
