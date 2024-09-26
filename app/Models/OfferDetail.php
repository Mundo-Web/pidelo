<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'product_id',
        'isParent'
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
