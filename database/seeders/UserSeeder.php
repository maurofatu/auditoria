<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    private $cities = [
        [
            'city'=>'arauca',
            'users'=>100
        ],
        [
            'city'=>'arauquita',
            'users'=>15
        ],
        [
            'city'=>'cravonorte',
            'users'=>3
        ],
        [
            'city'=>'fortul',
            'users'=>5
        ],
        [
            'city'=>'puertorondon',
            'users'=>1
        ],
        [
            'city'=>'saravena',
            'users'=>10
        ],
        [
            'city'=>'tame',
            'users'=>16
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 13;
        foreach ($this->cities as $city){
            for($i = 1; $i <= $city['users']; $i++){
                $name = $city['city'] . (($i <= 9)?'00':(($i <= 99)?'0':'')) . $i;

                User::create([
                    'id' => $id++,
                    'name'=>$name,
                    'email' => $name . '@galaxia.com',
                    'password' => Hash::make($name),
                    'fk_roles' => 4
                ]);
            }
        }
    }
}
