<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use App\Models\Asistente;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Memorandum;
use App\Models\TipoEvento;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\Cast\Int_;
use Ramsey\Uuid\Type\Integer;
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
        $tipo = TipoEvento::all();
        $usuarios = User::all();
        return view('evento.index', compact('tipo', 'usuarios'));
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

        $usuarios = User::all();
        $docentes = User::where('users.tipo_usuario_id', '=', 2)->select('users.*')->get();
        $estudiantes = User::where('users.tipo_usuario_id', '=', 3)->select('users.*')->get();

        $evento = Evento::create([
            'user_id' => auth()->user()->id,
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'start' => request()->input('start') . ' ' . request()->input('startH'),
            'end' => request()->input('end') . ' ' . request()->input('endH'),
            'lugar_evento' => request()->input('lugar_evento'),
            'resolucion_evento' => request()->input('resolucion'),
            'costo_evento' => request()->input('costo'),
            'tipo_event_id' => request()->input('tipo_event_id'),
        ]);

        if (request()->has('memorandum')) {
            $memo = Memorandum::create([
                'anio_memorandum' => now()->year,
                'remitente_memorandum' => auth()->user()->name,
                'cuerpo_memorandum' => request()->input('memorandum'),
                'event_id' => $evento->id,
            ]);

            $memo->update([
                'numero_memorandum' => $memo->id . '-' . now()->year,
            ]);
        }

        if (request()->has('id_asistente_usuario')) {
            $asists = request()->get('id_asistente_usuario');
            foreach ($asists as $asist) {
                $asistentes = Asistente::create([
                    'id_asistente_usuario' => $asist,
                    'event_id' => $evento->id,
                ]);
            }
        }

        if (request()->input('grupo') == 'comunidad_sis') {
            foreach ($usuarios as $usuario) {
                $asistentes = Asistente::create([
                    'id_asistente_usuario' => $usuario->id,
                    'event_id' => $evento->id,
                ]);
            }
        } elseif (request()->input('grupo') == 'docentes') {
            foreach ($docentes as $docente) {
                $asistentes = Asistente::create([
                    'id_asistente_usuario' => $docente->id,
                    'event_id' => $evento->id,
                ]);
            }
        } elseif (request()->input('grupo') == 'estudiantes') {
            foreach ($estudiantes as $estudiante) {
                $asistentes = Asistente::create([
                    'id_asistente_usuario' => $estudiante->id,
                    'event_id' => $evento->id,
                ]);
            }
        }
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
        // $evento = DB::table('events')->where('user_id', '=', auth()->user()->id)->get();

        if (auth()->user()->tipo_usuario_id == 1) {
            $evento = Evento::all();
        } else {
            $evento = Asistente::join('events', 'asistentes.event_id', '=', 'events.id')
                ->select('asistentes.*', 'events.*')
                ->where('asistentes.id_asistente_usuario', '=', auth()->user()->id)->get();
        }
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
        //return $evento;
        $asistentes = Asistente::where('event_id', '=', $id)
            ->select('id_asistente_usuario')
            ->pluck('id_asistente_usuario')
            ->toArray();
        $evento->asistentes = $asistentes;
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
        //return $request;
        DB::table('events')
            ->where('id', request()->id)
            ->update([
                'user_id' => Auth::user()->id,
                'title' => request()->input('title'),
                'description' => request()->input('description'),
                'lugar_evento' => request()->input('lugar_evento'),

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

    public function control_eventos()
    {
        return view('evento.controlevento');
    }

    public function control_evento_acta(Evento $evento)
    {
        $asistentes = Asistente::join('events', 'asistentes.event_id', '=', 'events.id')
            ->join('users', 'asistentes.id_asistente_usuario', '=', 'users.id')
            ->select('asistentes.id_asistente_usuario', 'users.name')
            ->where('events.id', '=', $evento->id)
            ->get();
        // return $asistentes;
        return view('evento.eventoacta', compact('evento', 'asistentes'));
    }

    public function control_evento_acta_guardar(Request $request, Evento $evento)
    {
        // $asistencias = $request->asistencia;
        // foreach ($asistencias as $asist) {
        //     echo $asist;
        // }
        // return $asistencias;
        $acta = Acta::create([
            'cuerpo_acta' => $request->cuerpo_acta,
            'event_id' => $evento->id
        ]);

        $acta->update([
            'numero_acta' => $acta->id . '-' . now()->year
        ]);

        if ($request->asistencia) {
            $asistencias = $request->asistencia;
            foreach ($asistencias as $asist) {
                Asistente::where('id_asistente_usuario', $asist)
                    ->where('event_id', $evento->id)
                    ->update([
                        'asistio' => 1,
                    ]);
            }
        }

        return redirect()->route('control_eventos');
    }

    public function actas()
    {
        return view('evento.actaslista');
    }

    public function acta_pdf(Acta $acta)
    {
        // return $acta;
        $evento = Evento::find($acta->event_id);
        $usuario = User::find($evento->user_id);
        $asistentes = Asistente::join('events', 'asistentes.event_id', '=', 'events.id')
            ->join('users', 'asistentes.id_asistente_usuario', '=', 'users.id')
            ->select('asistentes.id_asistente_usuario', 'users.name')
            ->where('events.id', '=', $evento->id)
            ->where('asistentes.asistio', '=', 1)
            ->get();
        // return $acta;

        $pdf = Pdf::loadView('evento.actapdf', ['acta' => $acta, 'evento' => $evento, 'asistentes' => $asistentes, 'usuario' => $usuario]);
        return $pdf->stream();
    }
}
