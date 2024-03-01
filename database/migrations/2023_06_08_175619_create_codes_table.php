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
            $table->string('client_name')->nullable();
            $table->string('section');
            $table->string('price_category')->nullable();
            $table->string('row')->nullable();
            $table->string('seat')->nullable();
            $table->string('cost_ticket')->nullable();
            $table->string('order')->nullable();
            $table->string('price_type')->nullable();
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