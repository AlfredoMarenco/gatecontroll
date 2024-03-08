<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Code extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos inversa

    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function status():BelongsTo
    {
        return $this->belongsTo((Status::class));
    }

    public function records():HasMany
    {
        return $this->hasMany(Record::class);
    }

    //Relacion uno a muchos a hasOneThrough de events a services
    public function eventService():HasOneThrough
    {
        return $this->hasOneThrough(Event::class, Service::class);
    }



}
