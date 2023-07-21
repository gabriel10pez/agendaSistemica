<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

use Carbon\Carbon;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $users = ModelsUser::query()
            ->when($this->search, function ($query, $search) {
                return $query->where(function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                });
            })->paginate(10);

        $rowNumber = 1;

        foreach ($users as $user) {
            $users->rowNumber = $rowNumber++;
        }
        
        return view('livewire.user', compact('users'));
    }
}
