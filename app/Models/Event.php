<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relacion uno a muchos
    public function codes():HasMany
    {
        return $this->hasMany(Code::class);
    }

    //Relacion muchos a muchos
    public function services():BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}