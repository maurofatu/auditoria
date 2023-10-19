<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimCity;

class DimCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $cities = [
        ['description' => 'ARAUCA'],
        ['description' => 'TAME'],
        ['description' => 'ARAUQUITA'],
        ['description' => 'CRAVO NORTE'],
        ['description' => 'FORTUL'],
        ['description' => 'PUERTO RONDON'],
        ['description' => 'SARAVENA'],
    ];
    public function run()
    {
        $id = 1;
        foreach ($this->cities as $city){
            DimCity::create([
                'id' => $id++,
                'description'=>$city['description'],
            ]);
        }
    }
}
