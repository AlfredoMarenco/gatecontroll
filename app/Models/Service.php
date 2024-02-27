<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function records():HasMany
    {
        return $this->hasMany(Record::class);
    }

    //Relacion muchos a muchos
    public function events():BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}