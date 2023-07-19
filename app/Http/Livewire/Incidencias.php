<?php

namespace App\Http\Livewire;


use App\Models\Incidencia;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Incidencias extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';

    public $modal = false;

    public $titulo_incidencia, $descripcion, $foto_incidencia;

    protected $rules = [
        'titulo_incidencia' => 'required',
        'descripcion' => 'required',
    ];
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        $incidencias = Incidencia::query()
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('titulo_incidencia', 'LIKE', '%' . $search . '%')
                        ->orWhere('descripcion', 'LIKE', '%' . $search . '%');
                });
            })->paginate(10);

        

        $rowNumber = 1;

        foreach ($incidencias as $incidencia) {
            $incidencia->rowNumber = $rowNumber++;
        }
        
        return view('livewire.incidencias', compact('incidencias'));
        
    }

    public function saveForm()
    {
        $this->validate();

        Incidencia::create([
            'titulo_incidencia' => $this->titulo_incidencia,
            'descripcion' => $this->descripcion,
            'foto_incidencia' => $this->foto_incidencia,
            // 'fecha_incxidencia' => Carbon::now(),
            'user_id' => auth()->user()->id,
        ]);

        $this->resetform();
    }

    public function resetform()
    {
        $this->titulo_incidencia = '';
        $this->descripcion = '';
        $this->foto_incidencia = '';
    }

    public function delete($id)
    {
        // $delete = Incidencia::findOrFail($id);

        Incidencia::find($id)->delete();
    }

}
