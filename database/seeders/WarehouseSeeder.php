<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Warehouse;
class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //insert name and type 
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,3) as  $value) {
            # code...
            DB::table('warehouse')->insert([
                'name' => $faker->name,
                'type' => $faker->text,
            ]);
        }
    }
}
