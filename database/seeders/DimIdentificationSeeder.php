<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimIdentification;

class DimIdentificationSeeder extends Seeder
{

    private $identifications = 17;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= $this->identifications; $i++){
            DimIdentification::create([
                'id' => $i,
                'description'=>$i ++
            ]);
        }
    }
}
