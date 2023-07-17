<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Livewire\Component;
use Livewire\WithPagination;

class Eventslist extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $eventos = Evento::join('tipo_eventos', 'events.tipo_event_id', '=', 'tipo_eventos.id')
            ->select('events.*', 'events.id as eventid', 'tipo_eventos.*')
            ->where('events.tipo_event_id', '=', 1)
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('events.title', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('events.description', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('events.lugar_evento', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->paginate(10);

        $eventos->each(function ($evento, $index) use ($eventos) {
            $evento->rowNumber = $eventos->firstItem() + $index;
        });
        return view('livewire.eventos.eventslist', [
            'eventos' => $eventos,
        ]);
    }
}
