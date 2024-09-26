<?php

namespace Database\Seeders;

use App\Models\Attributes;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Attributes::updateOrCreate(['titulo' => 'Marca'], [
            'id' => 1,
            'titulo' => 'Marca'
        ]);
        Attributes::updateOrCreate(['titulo' => 'Color'], [
            'id' => 2,
            'titulo' => 'Color'
        ]);
        Attributes::updateOrCreate(['titulo' => 'Tamaño'], [
            'id' => 3,
            'titulo' => 'Tamaño'
        ]);
    }
}
