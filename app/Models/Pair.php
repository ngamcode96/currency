<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;
    
    protected $fillable = ["currency_start", "currency_end", "rate"];

    public function start()
    {
        return $this->belongsTo(Currency::class, 'currency_start');
    }

    public function end()
    {
        return $this->belongsTo(Currency::class, 'currency_end');
    }

    public function conversion()
    {
        return $this->hasMany(Conversion::class, 'id');
    }
}
