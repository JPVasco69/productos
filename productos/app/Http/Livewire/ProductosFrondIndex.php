<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class ProductosFrondIndex extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $productos = Producto::where('nombre', 'LIKE', '%'.$this->search.'%')
                        ->orWhere('estado', 1)
                        ->latest('id')
                        ->paginate(5);

        return view('livewire.productos-frond-index', compact('productos'));
    }
}
