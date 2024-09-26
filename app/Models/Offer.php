<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'producto',
        'imagen',
        'precio',
        'descuento'
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'offer_details', 'offer_id', 'product_id')
        ->withPivot('isParent');
    }
}
