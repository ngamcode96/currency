<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    use HasFactory;

    public function pairs()
    {
        return $this->belongsTo(Pair::class, 'id');
    }
}
