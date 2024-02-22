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
    protected $queryString = ['search'];
    public $event;
    public $key;
    public $name;
    public $date_start;
    public $date_end;

    public $editEventForm = [
        'key' => null,
        'name' => null,
        'date_start' => null,
        'date_end' => null
    ];
    public $modal_create_event = false;
    public $modal_edit_event = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function storeEvent(){
        $this->validate([
            'key' => 'required|unique:events',
            'name' => 'required|unique:events',
            'date_start' => 'required',
            'date_end' => 'required'
        ]);

        Event::create([
            'key' => $this->key,
            'name' => $this->name,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'status' => 1
        ]);
        $this->reset('modal_create_event','key','name','date_start','date_end');
    }

    public function editEvent(Event $event){
        $this->event = $event;
        $this->modal_edit_event = true;
        $this->editEventForm['key'] = $event->key;
        $this->editEventForm['name'] = $event->name;
        $this->editEventForm['date_start'] = $event->date_start;
        $this->editEventForm['date_end'] = $event->date_end;
    }

    public function updateEvent(){
        $this->event->update([
            'key' => $this->editEventForm['key'],
            'name' => $this->editEventForm['name'],
            'date_start' => $this->editEventForm['date_start'],
            'date_end' => $this->editEventForm['date_end'],
        ]);
        $this->modal_edit_event = false;
    }

    public function showEvent(Event $event){
        $this->event = $event;
    }

    public function showCodes(Event $event){
        redirect()->route('codes',$event);
    }

    public function render()
    {
        $events = Event::where('name','LIKE' ,'%'.$this->search.'%')->latest('id')->paginate(7);
        return view('livewire.data-bases',[
            'events' => $events,
        ]);
    }
}