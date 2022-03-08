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
            "description" => "Cuenta Votos"
        ],
        [
            "id"=> 4,
            "description" => "Digitador + Cuenta Votos"
        ],
        [
            "id"=> 5,
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
