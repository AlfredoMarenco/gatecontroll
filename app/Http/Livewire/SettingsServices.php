<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;
use App\Models\Event;
use App\Models\User;

class SettingsServices extends Component
{

    public $service;
    public $actionSelect = 1;
    public $databases = [];
    public $scanners = [];

    public function mount(Service $service)
    {
        $this->service = $service;
        $this->databases = $service->events->pluck('id');
        $this->scanners = $service->users->pluck('id');
    }

    public function selectAction($value){
        $this->actionSelect = $value;
    }

    public function update(){
        $this->service->events()->sync($this->databases);
    }


    public function updateUsers(){
        $this->service->users()->sync($this->scanners);
    }

    public function render()
    {
        return view('livewire.settings-services',[
            'events' => Event::orderBy('id','desc')->get(),
            'users' => User::orderBy('id','desc')->get()
        ]);
    }
}
