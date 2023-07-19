<?php

namespace App\Http\Livewire;


use App\Models\Incidencia;
use Livewire\Component;
use Livewire\WithPagination;

class Incidencias extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';
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
    
    return view('livewire.incidencias', [
        'incidencias' => $incidencias,
    ]);
}

}
