<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Success',
            'message' => 'Pase',
            'type' => 'success'
        ]);

        Status::create([
            'name' => 'Stop',
            'message' => 'Alto',
            'type' => 'error'
        ]);

        Status::create([
            'name' => 'Warning',
            'message' => 'Revisar',
            'type' => 'warning'
        ]);
    }
}
