<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\Event;
use Livewire\Component;

class Services extends Component
{

    public $search;

    public $title;
    public $service;
    public $description;
    public $date_start;
    public $date_end;
    public $databases = [];
    public $modal_create_service = false;

    public $step1=true;
    public $step2=false;

    public function showService(Service $service){
        redirect()->route('services.settings',$service);
    }


    public function storeService(){
        $this->service = Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'status' => 1
        ]);

        $this->reset('title','description');
        $this->step1 = false;
        $this->step2 = true;
    }

    public function assignDatabases(){
        $this->service->events()->sync($this->databases);
    }

    public function render()
    {
        return view('livewire.services',[
            'services' => Service::where('title','LIKE' ,'%'.$this->search.'%')->latest('id')->paginate(7),
            'events' => Event::orderBy('id','desc')->get(),
        ]);
    }
}
