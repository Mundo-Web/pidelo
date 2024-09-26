<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $fillable =  [
        'titulo',
        'imagen',
        'descripcion',
        'valores',
        'color',
        'is_multiple',
        'status'
    ];

    public function values()
    {
        return $this->hasMany(Attributes::class, 'attribute_id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributesValues::class, 'attribute_id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'attribute_product_values', 'attribute_id', 'product_id')
            ->withPivot('attribute_value_id');
    }
}
