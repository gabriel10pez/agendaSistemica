<?php

namespace App\Http\Livewire\Actas;

use App\Models\Acta;
use Livewire\Component;
use Livewire\WithPagination;

class Actaslist extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $actas = Acta::join('events', 'actas.event_id', '=', 'events.id')
            ->join('tipo_eventos', 'events.tipo_event_id', '=', 'tipo_eventos.id')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->select('actas.*', 'events.title', 'events.description', 'events.start', 'events.end', 'tipo_eventos.nombre_tipo_evento', 'users.name as user_name')
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('events.title', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('actas.cuerpo_acta', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->paginate(10);



        $actas->each(function ($acta, $index) use ($actas) {
            $acta->rowNumber = $actas->firstItem() + $index;
        });

        return view('livewire.actas.actaslist', [
            'actas' => $actas
        ]);
    }
}
