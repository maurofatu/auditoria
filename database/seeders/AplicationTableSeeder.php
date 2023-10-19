<?php

namespace Database\Seeders;

use App\Models\AplicationTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplicationTableSeeder extends Seeder
{

    private $tables = [
        'dim_cities',
        'dim_communes',
        'dim_identifications',
        'dim_locations',
        'dim_people',
        'dim_political_parties',
        'dim_tables',
        'dim_elections',
        'fact_candidates',
        'fact_count_votes',
        'fact_permits',
        'fact_polling_stations',
        'fact_votes',
        'roles',
        'user_role_permits',
        'users'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->tables as $table){
            AplicationTable::create([
                'description'=>$table
            ]);
        }
    }
}
