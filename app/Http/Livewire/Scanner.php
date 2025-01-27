<?php

namespace App\Http\Livewire;

use App\Models\Code;
use Livewire\Component;

class Scanner extends Component
{
    public $barcode;
    public $user;

    public function scanBarcode()
    {
        $barcode = Code::where('barcode', $this->barcode)->where('status_id', '2')->first();
        //dd($barcode);
        if ($barcode) {
            $this->dispatchBrowserEvent('valid', [
                'title' => 'CODIGO YA INGRESADO',
                'html' => 'ALTO - TARJETA YA INGRESADA <br> <small> '. $barcode->updated_at .' </small>',
                'icon' => 'error',
                'timer' => 2500,
            ]);
            $this->reset('barcode');
        } else {
            $this->dispatchBrowserEvent('valid', [
                'title' => 'CODIGO VALIDO',
                'html' => 'ADELANTE',
                'icon' => 'success',
                'timer' => 1800,
            ]);
            Code::create([
                'barcode' => $this->barcode,
                'section' => 'filtro',
                'status_id' => 2,
                'event_id' => 1,
            ]);
            $this->reset('barcode');
        }
    }

    public function render()
    {
        return view('livewire.scanner');
    }
}
