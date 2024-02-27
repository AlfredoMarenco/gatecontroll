<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    //Relaciones uno a muchos inversa

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function code():BelongsTo
    {
        return $this->belongsTo(Code::class);
    }

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

}