<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Strength;

class BeneficiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Strength::updateOrCreate([
            'id' => 1
        ], [
            'titulo' => 'Entrega gratis',
            'descripcionshort' => 'Descubre Una Amplia Gama de Pisos, Tableros y Paneles',
            'descripcion' => '<p>Y devoluciones gratuitas. Ver pago para fechas de entrega.</p>',
            'icono' => 'images\img\box.png'
        ]);
    }
}
