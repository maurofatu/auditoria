<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimCommune;

class DimCommuneSeeder extends Seeder
{

    private $communes = [
        ['description' => 'COMUNA 1 RAIMUNDO CISNEROS O.'],
        ['description' => 'COMUNA 2 JOSEFA CANELONES'],
        ['description' => 'COMUNA 3 JOSE ANTONIO BENITEZ'],
        ['description' => 'COMUNA 4 JOSE LAURENCIO OSIO'],
        ['description' => 'COMUNA 5 JUAN JOSE RONDON'],
        ['description' => 'CORREGIMIENTO CAÑAS BRAVAS'],
        ['description' => 'CORREGIMIENTO MAPORILLAL'],
        ['description' => 'CORREGIMIENTO SANTA BARBARA'],
        ['description' => 'CORREGIMIENTO CARACOL'],
        ['description' => 'CORREGIMIENTO TODOS LOS SANTOS'],
        ['description' => 'SIN COMUNA']
    ];

    

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        foreach ($this->communes as $commune){
            DimCommune::create([
                'id' => $id++,
                'description'=>$commune['description'],
            ]);
        }
    }
}
