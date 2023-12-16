<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('category')->insert(array(
        	'title' => "Cambios",
            'description'  => "Aqui se informa los cambios del servidor",
            'status'  => 1,
          ));
        \DB::table('category')->insert(array(
        	'title' => "Novedades",
            'description'  => "Aqui se informa sobre novedades para el servidor",
            'status'  => 1,
          ));
        \DB::table('category')->insert(array(
        	'title' => "Filtraciones",
            'description'  => "Aqui se filtra todo lo nuevo del servidor",
            'status'  => 1,
          ));
    }
}
