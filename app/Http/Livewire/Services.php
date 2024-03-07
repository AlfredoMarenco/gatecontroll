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
    public $modal_edit_service = false;
    public $editServiceForm = [
        'key' => null,
        'title' => null,
        'description' => null,
        'date_start' => null,
        'date_end' => null
    ];

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
        $this->dispatchBrowserEvent('valid', [
            'title' => 'SERVICE CREATED SUCCESSFUL',
            'html' => '',
            'icon' => 'success',
            'timer' => 1500,
        ]);
        $this->modal_create_service = false;
        $this->reset('step1','step2');
    }

    //Function for edit service
    public function editService(Service $service){
        $this->service = $service;
        $this->modal_edit_service = true;
        $this->editServiceForm['title'] = $service->title;
        $this->editServiceForm['description'] = $service->description;
        $this->editServiceForm['date_start'] = $service->date_start;
        $this->editServiceForm['date_end'] = $service->date_end;
    }
    public function updateService(){
        $this->service->update([
            'title' => $this->editServiceForm['title'],
            'description' => $this->editServiceForm['description'],
            'date_start' => $this->editServiceForm['date_start'],
            'date_end' => $this->editServiceForm['date_end'],
        ]);
        $this->dispatchBrowserEvent('valid', [
            'title' => 'SERVICE UPDATED SUCCESSFUL',
            'html' => '',
            'icon' =>'success',
            'timer' => 1500,
        ]);
        $this->modal_edit_service = false;
        $this->reset('step1','step2');
    }


    public function render()
    {
        return view('livewire.services',[
            'services' => Service::where('title','LIKE' ,'%'.$this->search.'%')->latest('id')->paginate(7),
            'events' => Event::orderBy('id','desc')->get(),
        ]);
    }
}
