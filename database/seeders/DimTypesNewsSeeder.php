<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimTypesNews;

class DimTypesNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $typesNews = [
        ['description' => 'Jurado niega información'],
        ['description' => 'Enmendadura en formato E-14'],
        ['description' => 'Tachón Formato E-14']
    ];
    public function run()
    {
        $id = 1;
        foreach ($this->typesNews as $typeNew){
            DimTypesNews::create([
                'id' => $id++,
                'description'=>$typeNew['description'],
            ]);
        }
    }
}
