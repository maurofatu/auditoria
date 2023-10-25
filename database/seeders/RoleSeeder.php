<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

    private $roles = [
        [
            "id"=> 1,
            "description" => "Administrador"
        ],
        [
            "id"=> 2,
            "description" => "Digitador"
        ],
        [
            "id"=> 3,
            "description" => "Coordinador"
        ],
        [
            "id"=> 4,
            "description" => "Monitor"
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->roles as $rol){
            Role::create($rol);
        }
    }
}
