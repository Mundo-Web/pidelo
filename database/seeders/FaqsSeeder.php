<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faqs;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas = [
            ['titulo' => 'Pregunta 1', 'pregunta' => '¿Por qué comprar en Deco TAB?'],
            ['titulo' => 'Pregunta 2', 'pregunta' => '¿Qué comprar en Deco TAB?'],
            ['titulo' => 'Pregunta 3', 'pregunta' => '¿Cómo realizar una compra en Deco TAB?'],
            ['titulo' => 'Pregunta 4', 'pregunta' => '¿Dónde consultar la disponibilidad del producto?'],
            ['titulo' => 'Pregunta 5', 'pregunta' => '¿Qué promociones ofrece Deco TAB sobre Wall Panel y paneles de piedra cincelada?'],
            ['titulo' => 'Pregunta 6', 'pregunta' => '¿Cuánto mide un Wall Panel?'],
            ['titulo' => 'Pregunta 7', 'pregunta' => '¿Qué comprar en Deco TAB?'],
            ['titulo' => 'Pregunta 8', 'pregunta' => '¿Qué es el UV Mármol y para qué sirve?'],
        ];

        foreach ($preguntas as $key => $pregunta) {
            Faqs::updateOrCreate([
                'id' => $key + 1
            ], $pregunta);
        }
    }
}
