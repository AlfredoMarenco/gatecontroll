<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class DataBases extends Component
{
    use WithPagination;

    public $search = '';
    public $event;
    public $key_event;
    public $name_event;
    public $date_start_event;
    public $date_end_event;
    public $modal_create_event = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function store(){
        $this->validate([
            'key_event' => 'required',
            'name_event' => 'required',
            'date_start_event' => 'required',
            'date_end_event' => 'required'
        ]);

        Event::create([
            'key' => $this->key_event,
            'name' => $this->name_event,
            'date_start' => $this->date_start_event,
            'date_end' => $this->date_end_event,
            'status' => 1
        ]);
        $this->reset('modal_create_event','key_event','name_event','date_start_event','date_end_event');
    }

    public function showEvent(Event $event){
        $this->event = $event;
    }

    public function render()
    {
        $events = Event::where('name','LIKE' ,'%'.$this->search.'%')->latest('id')->paginate(7);
        return view('livewire.data-bases',[
            'events' => $events,
        ]);
    }
}
