<?php

namespace App\Imports;

use App\Models\Code;

use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CodesImport implements ToModel, WithChunkReading, ShouldQueue
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $event_id = null;

    public function __construct($event_id){
        $this->event_id = $event_id;
    }
    public function model(array $row)
    {
        return new Code([
            'barcode' => $row[0],
            'client_name' => $row[1],
            'section' => $row[2],
            'price_category' => $row[3],
            'row' => $row[4],
            'seat' => $row[5],
            'cost_ticket' => $row[6],
            'order' => $row[7],
            'price_type' => $row[8],
            'status_id' => $row[10],
            'event_id' => $this->event_id
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}