<?php

namespace Database\Seeders;

use App\Models\AplicationTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AplicationTableSeeder extends Seeder
{

    private $tables = [
        'roles',
        'users',
        'dim_political_parties',
        'dim_identifications',
        'dim_people',
        'dim_cities',
        'dim_communes',
        'dim_locations',
        'dim_tables',
        'dim_elections',
        'fact_candidates',
        'fact_polling_stations',
        'fact_permits',
        'fact_votes',
        'fact_count_votes',
        'user_role_permits', 
        'fact_potential_voters',
        'fact_trend_analyses',
        'dim_types_news',
        'fact_news'
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
