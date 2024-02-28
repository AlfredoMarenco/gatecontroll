<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class Services extends Component
{

    public $search;

    public function showService(Service $service){
        redirect()->route('services.settings',$service);
    }
    
    public function render()
    {
        return view('livewire.services',[
            'services' => Service::where('title','LIKE' ,'%'.$this->search.'%')->latest('id')->paginate(7),
        ]);
    }
}