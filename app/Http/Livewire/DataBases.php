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
    public $key;
    public $name;
    public $date_start;
    public $date_end;

    public $editEventForm = [
        'key' => null,
        'name' => null,
    ];
    public $modal_create_event = false;
    public $modal_edit_event = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function storeEvent()
    {
        $this->validate([
            'key' => 'required|unique:events',
            'name' => 'required|unique:events',
        ]);

        Event::create([
            'key' => $this->key,
            'name' => $this->name,
            'status' => 1
        ]);

        $this->dispatchBrowserEvent('valid', [
            'title' => 'DATA BASE CHARGE SUCCESSFUL',
            'html' => '',
            'icon' => 'success',
            'timer' => 2000,
        ]);
        $this->modal_create_event = false;
        $this->reset('modal_create_event', 'key', 'name');
    }

    public function editEvent(Event $event)
    {
        $this->event = $event;
        $this->modal_edit_event = true;
        $this->editEventForm['key'] = $event->key;
        $this->editEventForm['name'] = $event->name;
    }

    public function updateEvent()
    {
        $this->event->update([
            'key' => $this->editEventForm['key'],
            'name' => $this->editEventForm['name'],
        ]);
        $this->modal_edit_event = false;
    }

    public function showEvent(Event $event)
    {
        $this->event = $event;
    }

    public function showCodes(Event $event)
    {
        redirect()->route('databases.codes', $event);
    }

    public function deleteEvent(Event $event)
    {
        $event->delete();
    }

    public function render()
    {
        $events = Event::where('name', 'LIKE', '%' . $this->search . '%')->latest('id')->paginate(7);
        return view('livewire.data-bases', [
            'events' => $events,
        ]);
    }
}
