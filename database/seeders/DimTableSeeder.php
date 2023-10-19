<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimTable;

class DimTableSeeder extends Seeder
{

    private $num_table = 675;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= $this->num_table; $i ++){
            DimTable::create([
                'id' => $i,
                'description'=>"Mesa ".(($i <= 9)?'00'.$i:((($i <= 99)?'0'.$i:$i))),
            ]);
        }
    }
}
