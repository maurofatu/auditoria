<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimPerson;

class DimPersonSeeder extends Seeder
{
    private $people = [];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->people as $person){
            DimPerson::create($person);
        }
    }
}
