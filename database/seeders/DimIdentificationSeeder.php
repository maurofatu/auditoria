<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimIdentification;

class DimIdentificationSeeder extends Seeder
{

    private $identifications = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->identifications as $identification){
            DimIdentification::create([
                'description'=>$identification
            ]);
        }
    }
}
