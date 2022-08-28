<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $primaryKey = 'currency_code';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    protected $fillable = ['currency_code', 'currency_name'];

    public function startPairs()
    {
        return $this->hasMany(Pairs::class, 'currency_start');
    }

    public function endPairs()
    {
        return $this->hasMany(Pairs::class, 'currency_end');
    }

}
