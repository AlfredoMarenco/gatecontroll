<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('section');
            $table->string('row')->nullable();
            $table->string('seat')->nullable();
            $table->string('gate');
            $table->string('order');
            $table->float('price');
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('event_id')->constrained('events');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
};
