<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Codes extends Component
{
    use WithPagination;

    public $search='';
    public $actionSelect = 1;
    public $event;

    /* public function updatingSearch()
    {
        $this->resetPage();
    } */

    public function mount (Event $event){
        $this->event = $event;
    }

    public function selectAction($value){
        $this->actionSelect = $value;
    }

    public function render()
    {
        return view('livewire.codes',[
            'codes' => $this->event->codes()->where('barcode','LIKE','%'.$this->search.'%')->orderBy('barcode', 'asc')->paginate(10)
        ]);
    }
}