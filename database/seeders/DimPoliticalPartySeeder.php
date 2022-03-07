<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimPoliticalParty;

class DimPoliticalPartySeeder extends Seeder
{
    private $political_parties = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->political_parties as $political_party){
            DimPoliticalParty::create([
                'description'=>$political_party
            ]);
        }
    }
}
