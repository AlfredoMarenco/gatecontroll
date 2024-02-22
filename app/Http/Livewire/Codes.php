<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class Codes extends Component
{
    public $event;

    public function mount (Event $event){
        $this->event = $event;
    }



    public function render()
    {
        return view('livewire.codes',[
            'codes' => $this->event->codes()->paginate(10)
        ]);
    }
}