<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::updateOrCreate([
            'id' =>1 
        ],[
            'title' => 'Serie de Cargadores Premium',
            'description' => 'Funciones empaquetadas a un mejor precio que nunca Potentes sensores para
controla tu estado físico',
            'botontext1' => 'VENTA HASTA 30% DE DESCUENTO',
            'link1' => '/catalogo/0',
            'botontext2' => 'Comprar Ahora',
            'link1' => '#',

        ]);
    }
}
