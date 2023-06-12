<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    //Relacion uno a muchos
    public function codes():HasMany
    {
        return $this->hasMany(Code::class);
    }
}
