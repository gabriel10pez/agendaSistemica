<?php

namespace App\Http\Livewire\Memoranda;

use App\Models\Memorandum;
use Livewire\Component;
use Livewire\WithPagination;

class Memolist extends Component
{
    use WithPagination;

    public $search, $memu;

    public function render()
    {

        $memos = Memorandum::select('memoranda.id', 'memoranda.numero_memorandum', 'memoranda.anio_memorandum', 'memoranda.remitente_memorandum', 'memoranda.cuerpo_memorandum', 'memoranda.created_at', 'memoranda.updated_at', 'tipo_eventos.nombre_tipo_evento')
            ->join('events', 'events.id', '=', 'memoranda.event_id')
            ->join('tipo_eventos', 'tipo_eventos.id', '=', 'events.tipo_event_id')
            ->where('memoranda.numero_memorandum', 'LIKE', '%' . $this->search . '%')
            ->orWhere('memoranda.anio_memorandum', 'LIKE', '%' . $this->search . '%')
            ->orWhere('memoranda.remitente_memorandum', 'LIKE', '%' . $this->search . '%')
            ->orWhere('memoranda.cuerpo_memorandum', 'LIKE', '%' . $this->search . '%')
            ->orWhere('tipo_eventos.nombre_tipo_evento', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        $memos->each(function ($memo, $index) use ($memos) {
            $memo->rowNumber = $memos->firstItem() + $index;
        });

        return view('livewire.memoranda.memolist', [
            'memos' => $memos,
        ]);
    }
    public function edit(Memorandum $memu){

        $this->memu = $memu;
    }
    public function actualizar_memo()
    {
        $this->validate();
        $this->memu->save();
        //return proveedor;
        $this->memu = new Memorandum();
        //avisamos  al componente listar que creamos un componenetes
        //$this->emit('render');
        $this->emitTo('Memoranda.Memolist','render');

        $this->emit('alert','Actualizacion correcta','Se Actualizo correctamente el  el memorando');

        session()->flash('cerrarModal');
        $this->emitTo('Memoranda.Memolist', 'actualizarMemorandom');
    }


}
