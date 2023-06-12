<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    //Relaciones muchos a muchos

    public function codes():BelongsToMany
    {
        return $this->belongsToMany(Code::class);
    }

}
