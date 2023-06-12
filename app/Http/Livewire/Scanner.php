<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Scanner extends Component
{
    public $barcode;
    public $user;

    public function scanBarcode()
    {
        $this->dispatchBrowserEvent('valid',[
            'title' => 'CODIGO YA INGRESADO',
            'html' => 'ALTO - TARJETA YA INGRESADA <br> <small></small>',
            'icon' => 'error',
            'timer' => 2500,
        ]);
    }

    public function render()
    {
        return view('livewire.scanner');
    }
}
