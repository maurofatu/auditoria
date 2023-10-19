<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimElection;

class DimElectionSeeder extends Seeder
{

    private $elections = [
        ['id'=>1,'description' => 'ALCALDIA'],
        ['id'=>2,'description' => 'GOBERNACION'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->elections as $election){
            DimElection::create([
                'id'=>$election['id'],
                'description'=>$election['description'],
            ]);
        }
    }
}
