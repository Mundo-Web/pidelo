<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::updateOrCreate([
            'id' => 1
        ],[
            'address' => 'Av. Aramburu 1506',
            'inside' => 'Oficina 404 - Piso 4',
            'district' => 'Miraflores',
            'schedule' => "De Lunes a Viernes de 9:00am a 6:00pm y Sábados de 9:00am a 1:00pm",
            'city' => 'Lima',
            'country' => 'Perú',
            'cellphone' => '555-555-123' ,
            'office_phone' => '5555-1025' ,
            'email' => 'usuario@mundoweb.pe',
            'facebook' => 'www.facebook.com',
            'instagram' => 'www.instagram.com',
            'youtube' => 'www.youtube.com',
            'twitter' => 'www.twitter.com',
            'whatsapp' => '555-555-123' ,
            'form_email' => 'usuario@mundoweb.pe',
            'business_hours' => 'horas',
            'mensaje_whatsapp' => 'Hola estamos atentos a lo que ud desee',
            'htop' =>'Descubre los mejores productos y promociones en Deco Tab',
            'aboutus' => 'Debo Tab es una empresa reconocida por su innovación y distinción en el mercado peruano. Nuestro equipo ofrece una colección de paneles de piedra cincelada, brindando a tus espacios una sensación de autenticidad y elegancia incomparables. Además, destacamos por la calidad de nuestros UV Mármol, Wall Panel Mix y piedra PU.'
        ]);
    }
}
