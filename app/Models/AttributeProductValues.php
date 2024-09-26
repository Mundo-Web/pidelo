<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeProductValues extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_value_id',
        'img_atributo'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function attribute()
    {
        return $this->belongsTo(Attributes::class, 'attribute_id');
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributesValues::class, 'attribute_value_id');
    }
}
