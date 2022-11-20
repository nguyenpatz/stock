<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouse')->insert([
            ['name' => 'Điện thoại', 'type' => 'service'],
            ['name' => 'Laptop', 'type' => 'consu'],
        ]);
    }
}
