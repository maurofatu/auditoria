<?php

namespace Database\Seeders;

use App\Models\UserRolePermits;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolePermitsSeeder extends Seeder
{

    private $permits = [
        [
            'fk_roles' => 1,
            'fk_users' => null,
            'fk_aplication_tables' => [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
            'select' => true,
            'update' => true,
            'delete' => true
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->permits as $permit){
            foreach($permit['fk_aplication_tables'] as $table){
                UserRolePermits::create([
                    'fk_roles' => $permit['fk_roles'],
                    'fk_users' => $permit['fk_users'],
                    'fk_aplication_tables' => $table,
                    'select' => $permit['select'],
                    'update' => $permit['update'],
                    'delete' => $permit['delete'],
                ]);
            }
        }
    }
}
