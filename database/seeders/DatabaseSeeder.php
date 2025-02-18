<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DimPoliticalPartySeeder::class);
        $this->call(DimIdentificationSeeder::class);
        $this->call(DimPersonSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AplicationTableSeeder::class);
        $this->call(UserRolePermitsSeeder::class);
        
        $this->call(DimCitySeeder::class);
        $this->call(DimTableSeeder::class);
        $this->call(DimCommuneSeeder::class);
        $this->call(DimLocationSeeder::class);
        $this->call(DimElectionSeeder::class);
        $this->call(FactPollingStationSeeder::class);
        $this->call(FactCandidateSeeder::class);
        $this->call(DimTypesNewsSeeder::class);
        $this->call(UserSeeder::class);
    }
}
