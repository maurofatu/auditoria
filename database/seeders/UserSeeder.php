<?php

namespace Database\Seeders;

use App\Models\FactPermit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    private $cities = [
        [
            'city'=>'arauca',
            'users'=>252
        ],
        [
            'city'=>'tame',
            'users'=>121
        ],
        [
            'city'=>'arauquita',
            'users'=>111
        ],
        [
            'city'=>'cravonorte',
            'users'=>13
        ],
        [
            'city'=>'fortul',
            'users'=>43
        ],
        [
            'city'=>'puertorondon',
            'users'=>12
        ],
        [
            'city'=>'saravena',
            'users'=>123
        ]
    ];
    private $n_coordinadores = 20;
    private $n_monitores = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $id = 13;
        // foreach ($this->cities as $city){
        //     for($i = 1; $i <= $city['users']; $i++){
        //         $name = $city['city'] . (($i <= 9)?'00':(($i <= 99)?'0':'')) . $i;
        //         User::create([
        //             'id' => $id,
        //             'name'=>$name,
        //             'email' => $name . '@galaxia.com',
        //             'password' => Hash::make($name),
        //             'fk_roles' => 2
        //         ]);
                
        //     }
        // }
        // for( $i = 1; $i <= $this->n_coordinadores; $i++){
        //     $name = 'coordinador' . (($i <= 9)?'00':(($i <= 99)?'0':'')) . $i;
        //     User::create([
        //         'id' => $id++,
        //         'name'=>$name,
        //         'email' => $name . '@galaxia.com',
        //         'password' => Hash::make($name),
        //         'fk_roles' => 3
        //     ]);
        // }
        for( $i = 1; $i <= $this->n_monitores; $i++){
            $name = 'monitor' . (($i <= 9)?'00':(($i <= 99)?'0':'')) . $i;
            User::create([
                'name'=>$name,
                'email' => $name . '@galaxia.com',
                'password' => Hash::make($name),
                'fk_roles' => 4
            ]);
        }
    }
}
