<?php

namespace App\Http\Livewire\Memoranda;
use App\Models\Memorandum;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoEvento;
use App\Models\User;

class EditMemo extends Component
{
    public $open = false;
    public $memo;
    public function mount(Memorandum $memo){
        $this->memo = $memo;
    }
    protected $rules = [
        'memo.cuerpo_memorandum' => 'required'
    ];
    public function save(){
       $this -> memo->save();
    }
    public function edit($memo){
        $this -> memo->save();
    }
    public function render()
    {
        $tipo = TipoEvento::all();
        $usuarios = User::all();
        //return view('evento.index', compact('tipo', 'usuarios'));
        return view('livewire.memoranda.edit-memo', compact('tipo', 'usuarios'));
    }
}
