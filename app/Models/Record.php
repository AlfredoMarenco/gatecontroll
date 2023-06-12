<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones muchos a muchos

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
