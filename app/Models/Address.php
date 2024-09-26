<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'price_id',
        'street',
        'number',
        'description',
        'visible',
        'isDefault',
    ];

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id');
    }
}
