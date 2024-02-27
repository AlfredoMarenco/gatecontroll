<?php

namespace App\Http\Livewire;

use App\Imports\CodesImport;
use App\Models\Code;
use App\Models\Event;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Codes extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search='';
    public $actionSelect = 1;
    public $event;
    public $file;
    public $code;
    public $barcode;
    public $section;
    public $status = 1;

    public $modal_edit_code = false;
    public $modal_delete_code = false;

    public $editBarcodeForm = [
        'barcode' => null,
        'section' => null,
        'status' => null
    ];
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount (Event $event){
        $this->event = $event;
    }

    public function selectAction($value){
        $this->actionSelect = $value;
    }

    public function import(){
        $this->validate([
            'file' => 'required|mimes:csv',
        ]);

        Excel::import(new CodesImport($this->event->id), $this->file);

        session()->flash('message', 'Database successfully updated.');
    }

    public function addBarcode(){
        $this->validate([
            'barcode' => 'required',
            'section' => 'required',
        ]);
        Code::create([
            'barcode' => $this->barcode,
            'section' => $this->section,
            'status_id' => $this->status,
            'event_id' => $this->event->id
        ]);

        $this->reset('barcode','section');
        session()->flash('message', 'Barcode successfully added.');
    }

    public function editCode(Code $code){
        $this->code = $code;
        $this->modal_edit_code = true;
        $this->editBarcodeForm['barcode'] = $code->barcode;
        $this->editBarcodeForm['section'] = $code->section;
        $this->editBarcodeForm['status'] = $code->status_id;
    }

    public function updateCode(){
        $this->code->barcode = $this->editBarcodeForm['barcode'];
        $this->code->section = $this->editBarcodeForm['section'];
        $this->code->status_id = $this->editBarcodeForm['status'];
        $this->code->save();
        /* dd($this->editBarcodeForm); */
        $this->modal_edit_code = false;
    }

    public function delete(Code $code){
        $this->code = $code;
        $this->modal_delete_code = true;
    }
    public function deleteCode(){
        $this->code->delete();
        $this->modal_delete_code = false;
    }

    public function render()
    {
        return view('livewire.codes',[
            'codes' => $this->event->codes()->where('barcode','LIKE','%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10),
            'statuses' => Status::all()
        ]);
    }
}